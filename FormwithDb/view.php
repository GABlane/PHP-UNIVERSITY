<?php
include('config.php');

$recordFound = false;
$record = array();

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM personal_data WHERE Id = $id";
    $result = $conn->query($sql);
    
    if($result && $result->num_rows > 0){
        $record = $result->fetch_assoc();
        $recordFound = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Personal Data Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .info-card {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .section-title {
            background-color: #007bff;
            color: white;
            padding: 10px;
            margin: 0 -20px 15px -20px;
            border-radius: 5px 5px 0 0;
            font-weight: bold;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            min-width: 200px;
            color: #333;
        }
        .info-value {
            flex: 1;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <?php if($recordFound): ?>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Personal Data Sheet - View Record</h2>
            <div>
                <a href="forms.php?token=<?php echo $record['Id']; ?>" class="btn btn-warning">Edit Record</a>
                <a href="forms.php" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="info-card">
            <div class="section-title">Personal Information</div>
            <div class="info-row">
                <div class="info-label">Full Name:</div>
                <div class="info-value"><?php echo $record['FirstName'] . ' ' . $record['MiddleName'] . ' ' . $record['Surname'] . ' ' . $record['Ext']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Date of Birth:</div>
                <div class="info-value"><?php echo date('F j, Y', strtotime($record['BirthDate'])); ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Place of Birth:</div>
                <div class="info-value"><?php echo $record['PlaceOfBirth']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Sex:</div>
                <div class="info-value"><?php echo $record['Sex']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Civil Status:</div>
                <div class="info-value"><?php echo $record['CivilStatus']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Citizenship:</div>
                <div class="info-value"><?php echo $record['Citizenship']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Height:</div>
                <div class="info-value"><?php echo $record['Height'] ? $record['Height'] . ' m' : ''; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Weight:</div>
                <div class="info-value"><?php echo $record['Weight'] ? $record['Weight'] . ' kg' : ''; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Blood Type:</div>
                <div class="info-value"><?php echo $record['BloodType']; ?></div>
            </div>
        </div>

        <!-- Government IDs -->
        <div class="info-card">
            <div class="section-title">Government IDs</div>
            <div class="info-row">
                <div class="info-label">GSIS ID No.:</div>
                <div class="info-value"><?php echo $record['GSIS']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">PAG-IBIG ID No.:</div>
                <div class="info-value"><?php echo $record['Pagibig']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">PhilHealth No.:</div>
                <div class="info-value"><?php echo $record['Philhealth']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">SSS No.:</div>
                <div class="info-value"><?php echo $record['SSS']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">TIN No.:</div>
                <div class="info-value"><?php echo $record['TIN']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Agency Employee No.:</div>
                <div class="info-value"><?php echo $record['AgencyEmp']; ?></div>
            </div>
        </div>

        <!-- Residential Address -->
        <div class="info-card">
            <div class="section-title">Residential Address</div>
            <div class="info-row">
                <div class="info-label">Complete Address:</div>
                <div class="info-value">
                    <?php 
                    $resAddress = array_filter([
                        $record['ResHouseNo'],
                        $record['ResStreet'],
                        $record['ResSubdivision'],
                        $record['ResBarangay'],
                        $record['ResCity'],
                        $record['ResProvince'],
                        $record['ResZipCode']
                    ]);
                    echo implode(', ', $resAddress);
                    ?>
                </div>
            </div>
        </div>

        <!-- Permanent Address -->
        <div class="info-card">
            <div class="section-title">Permanent Address</div>
            <div class="info-row">
                <div class="info-label">Complete Address:</div>
                <div class="info-value">
                    <?php 
                    $permAddress = array_filter([
                        $record['PermHouseNo'],
                        $record['PermStreet'],
                        $record['PermSubdivision'],
                        $record['PermBarangay'],
                        $record['PermCity'],
                        $record['PermProvince'],
                        $record['PermZipCode']
                    ]);
                    echo implode(', ', $permAddress);
                    ?>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="info-card">
            <div class="section-title">Contact Information</div>
            <div class="info-row">
                <div class="info-label">Telephone No.:</div>
                <div class="info-value"><?php echo $record['Telephone']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Mobile No.:</div>
                <div class="info-value"><?php echo $record['Mobile']; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Email Address:</div>
                <div class="info-value"><?php echo $record['Email']; ?></div>
            </div>
        </div>

        <!-- Record Information -->
        <div class="info-card">
            <div class="section-title">Record Information</div>
            <div class="info-row">
                <div class="info-label">Created:</div>
                <div class="info-value"><?php echo date('F j, Y g:i A', strtotime($record['CreatedAt'])); ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Last Updated:</div>
                <div class="info-value"><?php echo date('F j, Y g:i A', strtotime($record['UpdatedAt'])); ?></div>
            </div>
        </div>

    <?php else: ?>
        <div class="alert alert-danger">
            <h4>Record Not Found</h4>
            <p>The requested record could not be found or does not exist.</p>
            <a href="forms.php" class="btn btn-primary">Back to Personal Data Sheet</a>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>