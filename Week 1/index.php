<?php
$fields = [
    'name' => 'Full Name',
    'pob' => 'Place of Birth',
    'dob' => 'Date of Birth',
    'address' => 'Address',
    'gender' => 'Gender',
    'telephone' => 'Telephone',
    'email' => 'Email',
    'parent_name' => 'Parent Name',
    'parent_telephone' => 'Parent Telephone',
    'relationship' => 'Relationship',
    'student_id' => 'Student ID',
    'faculty' => 'Faculty',
    'department' => 'Department',
    'class' => 'Class',
    'registration_date' => 'Registration Date'
];

$values = [];
foreach ($fields as $key => $label) {
    $values[$key] = '';
}

$errors = [];
$imagePath = '';
$submitted = false;

function h($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect form values
    foreach ($fields as $key => $label) {
        $values[$key] = trim($_POST[$key] ?? '');

        if ($values[$key] === '') {
            $errors[$key] = "$label is required.";
        }
    }

    // Validate name: letters and spaces only
    if ($values['name'] !== '' &&
        !preg_match('/^[\p{L} ]+$/u', $values['name'])) {
        $errors['name'] = 'Name must contain letters and spaces only.';
    }

    // Validate email
    if ($values['email'] !== '' &&
        !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    // Validate dates
    foreach (['dob', 'registration_date'] as $dateField) {
        if ($values[$dateField] !== '') {
            $date = DateTime::createFromFormat(
                '!Y-m-d',
                $values[$dateField]
            );

            if (!$date || $date->format('Y-m-d') !== $values[$dateField]) {
                $errors[$dateField] = 'Please enter a valid date.';
            }
        }
    }

    // Validate uploaded image
    if (!isset($_FILES['image']) ||
        $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {

        $errors['image'] = 'Please upload a student image.';

    } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {

        $errors['image'] = 'Image upload failed. Please try again.';

    } else {
        $tmp = $_FILES['image']['tmp_name'];
        $extension = strtolower(
            pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)
        );

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $allowedMimeTypes = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/webp'
        ];

        $mime = (new finfo(FILEINFO_MIME_TYPE))->file($tmp);
        $imageInfo = @getimagesize($tmp);

        if (
            !in_array($extension, $allowedExtensions, true) ||
            !in_array($mime, $allowedMimeTypes, true) ||
            $imageInfo === false
        ) {
            $errors['image'] =
                'Only JPG, JPEG, PNG, GIF and WEBP images are allowed.';

        } elseif ($_FILES['image']['size'] > 2 * 1024 * 1024) {
            $errors['image'] = 'Image must not exceed 2 MB.';
        }
    }

    // If all validations pass, save image and display results
    if (empty($errors)) {
        $uploadDir = __DIR__ . '/uploads/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $extension = strtolower(
            pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)
        );

        $fileName = bin2hex(random_bytes(12)) . '.' . $extension;
        $destination = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            $imagePath = 'uploads/' . $fileName;
            $submitted = true;
        } else {
            $errors['image'] =
                'Unable to save image. Check folder permissions.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
        }

        .container {
            max-width: 1000px;
            margin-top: 35px;
            margin-bottom: 35px;
        }

        .header {
            background: #164e86;
            color: white;
            padding: 25px;
            border-radius: 12px 12px 0 0;
        }

        .content {
            background: white;
            padding: 25px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 5px 20px #00000012;
        }

        fieldset {
            border: 1px solid #d5deea;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }

        legend {
            color: #164e86;
            font-size: 19px;
            font-weight: bold;
            padding: 0 8px;
            width: auto;
        }

        .required {
            color: red;
        }

        .student-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h2>Student Registration System</h2>
        <p class="mb-0">
            Jamhuriya University of Science & Technology
        </p>
    </div>

    <div class="content">

    <?php if ($submitted): ?>

        <!-- RESULT PAGE IN THE SAME INDEX.PHP -->

        <div class="alert alert-success">
            <h4>Registration Successful!</h4>
            Student information has been submitted successfully.
        </div>

        <h4 class="text-primary">Submitted Student Information</h4>

        <div class="text-center mb-4">
            <img src="<?= h($imagePath) ?>"
                 class="student-image"
                 alt="Student Image">
        </div>

        <?php
        $sections = [
            'Personal Information' => [
                'name' => 'Full Name',
                'pob' => 'Place of Birth',
                'dob' => 'Date of Birth',
                'address' => 'Address',
                'gender' => 'Gender',
                'telephone' => 'Telephone',
                'email' => 'Email'
            ],
            'Parent Information' => [
                'parent_name' => 'Parent Name',
                'parent_telephone' => 'Parent Telephone',
                'relationship' => 'Relationship'
            ],
            'Academic Information' => [
                'student_id' => 'Student ID',
                'faculty' => 'Faculty',
                'department' => 'Department',
                'class' => 'Class',
                'registration_date' => 'Registration Date'
            ]
        ];
        ?>

        <?php foreach ($sections as $section => $items): ?>

            <h5 class="text-primary mt-4">
                <?= h($section) ?>
            </h5>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Field</th>
                            <th>Information</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($items as $key => $label): ?>
                        <tr>
                            <td><?= h($label) ?></td>
                            <td><?= h($values[$key]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php endforeach; ?>

        <button onclick="window.print()"
                class="btn btn-success">
            Print Information
        </button>

        <a href="index.php" class="btn btn-primary">
            Register Another Student
        </a>

    <?php else: ?>

        <!-- REGISTRATION FORM -->

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <strong>Please correct these errors:</strong>
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= h($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST"
              action="index.php"
              enctype="multipart/form-data">

            <!-- PERSONAL INFORMATION -->

            <fieldset>
                <legend>1. Personal Information</legend>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Full Name <span class="required">*</span></label>
                        <input type="text" name="name"
                               class="form-control"
                               value="<?= h($values['name']) ?>"
                               required>
                        <?php if (isset($errors['name'])): ?>
                            <small class="text-danger"><?= h($errors['name']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Place of Birth (POB) <span class="required">*</span></label>
                        <input type="text" name="pob"
                               class="form-control"
                               value="<?= h($values['pob']) ?>"
                               required>
                        <?php if (isset($errors['pob'])): ?>
                            <small class="text-danger"><?= h($errors['pob']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Birth (DOB) <span class="required">*</span></label>
                        <input type="date" name="dob"
                               class="form-control"
                               value="<?= h($values['dob']) ?>"
                               required>
                        <?php if (isset($errors['dob'])): ?>
                            <small class="text-danger"><?= h($errors['dob']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Address <span class="required">*</span></label>
                        <input type="text" name="address"
                               class="form-control"
                               value="<?= h($values['address']) ?>"
                               required>
                        <?php if (isset($errors['address'])): ?>
                            <small class="text-danger"><?= h($errors['address']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender <span class="required">*</span></label>
                        <select name="gender" class="form-select" required>
                            <option value="">Select Gender</option>
                            <?php foreach (['Male', 'Female', 'Other'] as $g): ?>
                                <option value="<?= h($g) ?>"
                                    <?= $values['gender'] === $g ? 'selected' : '' ?>>
                                    <?= h($g) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['gender'])): ?>
                            <small class="text-danger"><?= h($errors['gender']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Telephone <span class="required">*</span></label>
                        <input type="tel" name="telephone"
                               class="form-control"
                               value="<?= h($values['telephone']) ?>"
                               required>
                        <?php if (isset($errors['telephone'])): ?>
                            <small class="text-danger"><?= h($errors['telephone']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email <span class="required">*</span></label>
                        <input type="email" name="email"
                               class="form-control"
                               value="<?= h($values['email']) ?>"
                               required>
                        <?php if (isset($errors['email'])): ?>
                            <small class="text-danger"><?= h($errors['email']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Student Image <span class="required">*</span></label>
                        <input type="file" name="image"
                               class="form-control"
                               accept=".png,.jpg,.jpeg,.gif,.webp"
                               required>
                        <small class="text-muted">
                            PNG, JPG, JPEG, GIF or WEBP. Max 2 MB.
                        </small>
                        <?php if (isset($errors['image'])): ?>
                            <br><small class="text-danger"><?= h($errors['image']) ?></small>
                        <?php endif; ?>
                    </div>

                </div>
            </fieldset>

            <!-- PARENT INFORMATION -->

            <fieldset>
                <legend>2. Parent Information</legend>

                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">Parent Name <span class="required">*</span></label>
                        <input type="text" name="parent_name"
                               class="form-control"
                               value="<?= h($values['parent_name']) ?>"
                               required>
                        <?php if (isset($errors['parent_name'])): ?>
                            <small class="text-danger"><?= h($errors['parent_name']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Parent Telephone <span class="required">*</span></label>
                        <input type="tel" name="parent_telephone"
                               class="form-control"
                               value="<?= h($values['parent_telephone']) ?>"
                               required>
                        <?php if (isset($errors['parent_telephone'])): ?>
                            <small class="text-danger"><?= h($errors['parent_telephone']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Relationship <span class="required">*</span></label>
                        <select name="relationship" class="form-select" required>
                            <option value="">Select Relationship</option>
                            <?php foreach (['Father', 'Mother', 'Guardian', 'Other'] as $r): ?>
                                <option value="<?= h($r) ?>"
                                    <?= $values['relationship'] === $r ? 'selected' : '' ?>>
                                    <?= h($r) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['relationship'])): ?>
                            <small class="text-danger"><?= h($errors['relationship']) ?></small>
                        <?php endif; ?>
                    </div>

                </div>
            </fieldset>

            <!-- ACADEMIC INFORMATION -->

            <fieldset>
                <legend>3. Academic Information</legend>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Student ID <span class="required">*</span></label>
                        <input type="text" name="student_id"
                               class="form-control"
                               value="<?= h($values['student_id']) ?>"
                               required>
                        <?php if (isset($errors['student_id'])): ?>
                            <small class="text-danger"><?= h($errors['student_id']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Faculty <span class="required">*</span></label>
                        <input type="text" name="faculty"
                               class="form-control"
                               value="<?= h($values['faculty']) ?>"
                               required>
                        <?php if (isset($errors['faculty'])): ?>
                            <small class="text-danger"><?= h($errors['faculty']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Department <span class="required">*</span></label>
                        <input type="text" name="department"
                               class="form-control"
                               value="<?= h($values['department']) ?>"
                               required>
                        <?php if (isset($errors['department'])): ?>
                            <small class="text-danger"><?= h($errors['department']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Class <span class="required">*</span></label>
                        <input type="text" name="class"
                               class="form-control"
                               value="<?= h($values['class']) ?>"
                               required>
                        <?php if (isset($errors['class'])): ?>
                            <small class="text-danger"><?= h($errors['class']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Registration Date <span class="required">*</span></label>
                        <input type="date" name="registration_date"
                               class="form-control"
                               value="<?= h($values['registration_date']) ?>"
                               required>
                        <?php if (isset($errors['registration_date'])): ?>
                            <small class="text-danger"><?= h($errors['registration_date']) ?></small>
                        <?php endif; ?>
                    </div>

                </div>
            </fieldset>

            <button type="reset" class="btn btn-secondary">
                Clear Form
            </button>

            <button type="submit" class="btn btn-primary">
                Register Student
            </button>

        </form>

    <?php endif; ?>

    </div>
</div>

</body>
</html>