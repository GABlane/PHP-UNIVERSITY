<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Data Sheet System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        .feature-card {
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #667eea;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-user-circle"></i> PDS System
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="forms.php">Personal Data Sheet</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Personal Data Sheet System</h1>
            <p class="lead mb-4">Comprehensive solution for managing personal information records</p>
            <a href="forms.php" class="btn btn-light btn-lg">
                <i class="fas fa-plus"></i> Get Started
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-12">
                    <h2 class="fw-bold">System Features</h2>
                    <p class="text-muted">Everything you need to manage personal data efficiently</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center">
                            <i class="fas fa-user-plus feature-icon"></i>
                            <h5 class="card-title">Add Records</h5>
                            <p class="card-text">Create new personal data entries with comprehensive information fields</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center">
                            <i class="fas fa-eye feature-icon"></i>
                            <h5 class="card-title">View Details</h5>
                            <p class="card-text">Access detailed formatted view of all personal information</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center">
                            <i class="fas fa-edit feature-icon"></i>
                            <h5 class="card-title">Edit Records</h5>
                            <p class="card-text">Update and modify existing records with easy-to-use forms</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 feature-card">
                        <div class="card-body text-center">
                            <i class="fas fa-shield-alt feature-icon"></i>
                            <h5 class="card-title">Data Security</h5>
                            <p class="card-text">Secure data handling with duplicate prevention mechanisms</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent">
                        <div class="card-body">
                            <i class="fas fa-database text-primary" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-3">
                                <?php 
                                // Include database connection and get record count
                                try {
                                    include('config.php');
                                    $result = $conn->query("SELECT COUNT(*) as count FROM personal_data");
                                    $count = $result ? $result->fetch_assoc()['count'] : 0;
                                    echo $count;
                                } catch (Exception $e) {
                                    echo "0";
                                }
                                ?>
                            </h4>
                            <p class="text-muted">Total Records</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent">
                        <div class="card-body">
                            <i class="fas fa-users text-success" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-3">Complete</h4>
                            <p class="text-muted">Data Management</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent">
                        <div class="card-body">
                            <i class="fas fa-lock text-warning" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-3">Secure</h4>
                            <p class="text-muted">Information Storage</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions Section -->
    <section class="py-5">
        <div class="container text-center">
            <h3 class="mb-4">Quick Actions</h3>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a href="forms.php" class="btn btn-primary btn-lg me-md-2">
                            <i class="fas fa-plus"></i> Add New Record
                        </a>
                        <a href="forms.php#records-table" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-list"></i> View All Records
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-12">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> Personal Data Sheet System. Built with PHP & Bootstrap.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>