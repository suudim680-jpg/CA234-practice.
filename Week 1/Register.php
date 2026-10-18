<?php
$errors = [];

$student = [
    "fullname" => "",
    "email" => "",
    "pob" => "",
    "gender" => "",
    "faculty" => "",
    "languages" => [],
    "comment" => ""
];

if (isset($_GET["submit"])) {

    $student["fullname"] = trim($_GET["fullname"] ?? "");
    $student["email"] = trim($_GET["email"] ?? "");
    $student["pob"] = trim($_GET["pob"] ?? "");
    $student["gender"] = $_GET["gender"] ?? "";
    $student["faculty"] = $_GET["faculty"] ?? "";
    $student["comment"] = trim($_GET["comment"] ?? "");

    // Validate languages input
    $allowedLanguages = ["Somali", "English", "Arabic", "Chinese"];
    $submittedLanguages = $_GET["languages"] ?? [];

    if (!is_array($submittedLanguages)) {
        $submittedLanguages = [];
    }

    $student["languages"] = array_values(
        array_intersect($allowedLanguages, $submittedLanguages)
    );

    // Validation
    if ($student["fullname"] == "") {
        $errors["fullname"] = "Fullname is required.";
    }

    if ($student["email"] == "") {
        $errors["email"] = "Email is required.";
    } elseif (!filter_var($student["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Please enter a valid email address.";
    }

    if ($student["pob"] == "") {
        $errors["pob"] = "Place of Birth is required.";
    }

    if (!in_array($student["gender"], ["male", "female"], true)) {
        $errors["gender"] = "Please select your gender.";
    }

    $allowedFaculties = ["computer", "medicine", "engineering", "ecom"];

    if (!in_array($student["faculty"], $allowedFaculties, true)) {
        $errors["faculty"] = "Please select your faculty.";
    }

    if (empty($student["languages"])) {
        $errors["languages"] = "Please select at least one language.";
    }

    if ($student["comment"] == "") {
        $errors["comment"] = "Comment is required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f0f4f8;
            font-family: Arial, sans-serif;
        }

        .registration-card {
            max-width: 650px;
            margin: 40px auto;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #0d6efd, #084298);
            color: white;
            padding: 25px;
            text-align: center;
        }

        .form-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px;
        }

        .btn {
            border-radius: 8px;
            padding: 10px 20px;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }

        .language-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .result-card {
            max-width: 650px;
            margin: 20px auto;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="container">

    <?php if (isset($_GET["submit"]) && empty($errors)): ?>

        <div class="card shadow result-card">
            <div class="card-header bg-success text-white p-3">
                <h3 class="mb-0">Registration Successful!</h3>
            </div>

            <div class="card-body p-4">
                <h5 class="mb-3">Student Information</h5>

                <p><strong>Fullname:</strong>
                    <?= htmlspecialchars($student["fullname"]) ?></p>

                <p><strong>Email:</strong>
                    <?= htmlspecialchars($student["email"]) ?></p>

                <p><strong>Place of Birth:</strong>
                    <?= htmlspecialchars($student["pob"]) ?></p>

                <p><strong>Gender:</strong>
                    <?= htmlspecialchars(ucfirst($student["gender"])) ?></p>

                <p><strong>Faculty:</strong>
                    <?php
                    $facultyNames = [
                        "computer" => "Computer and IT",
                        "medicine" => "Medicine and Health Science",
                        "engineering" => "Engineering",
                        "ecom" => "Business"
                    ];
                    echo htmlspecialchars($facultyNames[$student["faculty"]]);
                    ?>
                </p>

                <p><strong>Languages:</strong>
                    <?= htmlspecialchars(implode(", ", $student["languages"])) ?>
                </p>

                <p><strong>Comment:</strong>
                    <?= nl2br(htmlspecialchars($student["comment"])) ?></p>

                <a href="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>"
                   class="btn btn-primary">
                    Register Another Student
                </a>
            </div>
        </div>

    <?php else: ?>

        <div class="card shadow registration-card">

            <div class="form-header">
                <h2 class="fw-bold">Student Registration</h2>
                <p class="mb-0">Please fill in your information below</p>
            </div>

            <div class="form-body">

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        Please correct the errors below.
                    </div>
                <?php endif; ?>

                <form method="get" action="" novalidate>

                    <!-- Fullname -->
                    <div class="mb-3">
                        <label for="fullname" class="form-label">
                            Fullname
                        </label>

                        <input type="text" id="fullname" name="fullname"
                               class="form-control <?= isset($errors['fullname']) ? 'is-invalid' : '' ?>"
                               placeholder="Enter your full name"
                               value="<?= htmlspecialchars($student["fullname"]) ?>">

                        <?php if (isset($errors["fullname"])): ?>
                            <div class="error">
                                <?= $errors["fullname"] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>

                        <input type="email" id="email" name="email"
                               class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                               placeholder="example@email.com"
                               value="<?= htmlspecialchars($student["email"]) ?>">

                        <?php if (isset($errors["email"])): ?>
                            <div class="error">
                                <?= $errors["email"] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Place of Birth -->
                    <div class="mb-3">
                        <label for="pob" class="form-label">
                            Place of Birth
                        </label>

                        <input type="text" id="pob" name="pob"
                               class="form-control <?= isset($errors['pob']) ? 'is-invalid' : '' ?>"
                               placeholder="Enter your place of birth"
                               value="<?= htmlspecialchars($student["pob"]) ?>">

                        <?php if (isset($errors["pob"])): ?>
                            <div class="error">
                                <?= $errors["pob"] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Gender -->
                    <div class="mb-3">
                        <label class="form-label d-block">Gender</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"
                                   name="gender" id="male" value="male"
                                   <?= $student["gender"] == "male" ? "checked" : "" ?>>

                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"
                                   name="gender" id="female" value="female"
                                   <?= $student["gender"] == "female" ? "checked" : "" ?>>

                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>

                        <?php if (isset($errors["gender"])): ?>
                            <div class="error">
                                <?= $errors["gender"] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Faculty -->
                    <div class="mb-3">
                        <label for="faculty" class="form-label">
                            Faculty
                        </label>

                        <select name="faculty" id="faculty"
                                class="form-select <?= isset($errors['faculty']) ? 'is-invalid' : '' ?>">

                            <option value="">-- Select Faculty --</option>

                            <option value="computer"
                                <?= $student["faculty"] == "computer" ? "selected" : "" ?>>
                                Computer and IT
                            </option>

                            <option value="medicine"
                                <?= $student["faculty"] == "medicine" ? "selected" : "" ?>>
                                Medicine and Health Science
                            </option>

                            <option value="engineering"
                                <?= $student["faculty"] == "engineering" ? "selected" : "" ?>>
                                Engineering
                            </option>

                            <option value="ecom"
                                <?= $student["faculty"] == "ecom" ? "selected" : "" ?>>
                                Business
                            </option>
                        </select>

                        <?php if (isset($errors["faculty"])): ?>
                            <div class="error">
                                <?= $errors["faculty"] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Languages -->
                    <div class="mb-3">
                        <label class="form-label d-block">Languages</label>

                        <div class="language-box">
                            <?php
                            $languages = ["Somali", "English", "Arabic", "Chinese"];

                            foreach ($languages as $language):
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="languages[]"
                                           id="<?= strtolower($language) ?>"
                                           value="<?= $language ?>"
                                           <?= in_array($language, $student["languages"]) ? "checked" : "" ?>>

                                    <label class="form-check-label"
                                           for="<?= strtolower($language) ?>">
                                        <?= $language ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <?php if (isset($errors["languages"])): ?>
                            <div class="error">
                                <?= $errors["languages"] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Comment -->
                    <div class="mb-4">
                        <label for="comment" class="form-label">
                            Comment
                        </label>

                        <textarea name="comment" id="comment" rows="4"
                                  class="form-control <?= isset($errors['comment']) ? 'is-invalid' : '' ?>"
                                  placeholder="Write your comment here..."><?= htmlspecialchars($student["comment"]) ?></textarea>

                        <?php if (isset($errors["comment"])): ?>
                            <div class="error">
                                <?= $errors["comment"] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-2">
                        <button type="submit" name="submit" value="Register"
                                class="btn btn-primary flex-grow-1">
                            Register
                        </button>

                        <a href="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>"
                           class="btn btn-outline-secondary">
                            Clear
                        </a>
                    </div>

                </form>
            </div>
        </div>

    <?php endif; ?>

</div>

</body>
</html>