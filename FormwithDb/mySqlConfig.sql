-- ============================================
-- Personal Data Sheet Database Setup
-- ============================================

-- Create database
CREATE DATABASE IF NOT EXISTS personal_data_db 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE personal_data_db;

-- Drop table if exists (for clean installation)
DROP TABLE IF EXISTS personal_data;

-- Create personal_data table
CREATE TABLE personal_data (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- Name Information
    Surname VARCHAR(100) NOT NULL,
    FirstName VARCHAR(100) NOT NULL,
    MiddleName VARCHAR(100) DEFAULT NULL,
    Ext VARCHAR(10) DEFAULT NULL,
    
    -- Personal Details
    BirthDate DATE NOT NULL,
    Sex ENUM('Male', 'Female') NOT NULL,
    PlaceOfBirth VARCHAR(255) DEFAULT NULL,
    Citizenship VARCHAR(100) DEFAULT NULL,
    CivilStatus ENUM('Single', 'Married', 'Widowed', 'Separated', 'Others') DEFAULT NULL,
    
    -- Physical Characteristics
    Height VARCHAR(10) DEFAULT NULL,
    Weight VARCHAR(10) DEFAULT NULL,
    BloodType ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-') DEFAULT NULL,
    
    -- Government IDs
    GSIS VARCHAR(50) DEFAULT NULL,
    Pagibig VARCHAR(50) DEFAULT NULL,
    Philhealth VARCHAR(50) DEFAULT NULL,
    SSS VARCHAR(50) DEFAULT NULL,
    TIN VARCHAR(50) DEFAULT NULL,
    AgencyEmp VARCHAR(50) DEFAULT NULL,
    
    -- Residential Address
    ResHouseNo VARCHAR(100) DEFAULT NULL,
    ResStreet VARCHAR(100) DEFAULT NULL,
    ResSubdivision VARCHAR(100) DEFAULT NULL,
    ResBarangay VARCHAR(100) DEFAULT NULL,
    ResCity VARCHAR(100) DEFAULT NULL,
    ResProvince VARCHAR(100) DEFAULT NULL,
    ResZipCode VARCHAR(10) DEFAULT NULL,
    
    -- Permanent Address
    PermHouseNo VARCHAR(100) DEFAULT NULL,
    PermStreet VARCHAR(100) DEFAULT NULL,
    PermSubdivision VARCHAR(100) DEFAULT NULL,
    PermBarangay VARCHAR(100) DEFAULT NULL,
    PermCity VARCHAR(100) DEFAULT NULL,
    PermProvince VARCHAR(100) DEFAULT NULL,
    PermZipCode VARCHAR(10) DEFAULT NULL,
    
    -- Contact Information
    Telephone VARCHAR(20) DEFAULT NULL,
    Mobile VARCHAR(20) DEFAULT NULL,
    Email VARCHAR(100) DEFAULT NULL,
    
    -- Timestamps
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Indexes for better performance
    INDEX idx_surname (Surname),
    INDEX idx_firstname (FirstName),
    INDEX idx_birthdate (BirthDate),
    INDEX idx_fullname (Surname, FirstName, MiddleName)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Insert Sample Data (Optional - for testing)
-- ============================================

INSERT INTO personal_data (
    Surname, FirstName, MiddleName, Ext, BirthDate, Sex, PlaceOfBirth, 
    Citizenship, CivilStatus, Height, Weight, BloodType, 
    GSIS, Pagibig, Philhealth, SSS, TIN, AgencyEmp,
    ResHouseNo, ResStreet, ResSubdivision, ResBarangay, ResCity, ResProvince, ResZipCode,
    PermHouseNo, PermStreet, PermSubdivision, PermBarangay, PermCity, PermProvince, PermZipCode,
    Telephone, Mobile, Email
) VALUES (
    'Dela Cruz', 'Juan', 'Santos', 'Jr.', '1990-05-15', 'Male', 'Manila, Metro Manila',
    'Filipino', 'Single', '1.75', '70', 'O+',
    '1234567890', '1234567890123', '12-345678901-2', '12-3456789-0', '123-456-789-000', 'EMP-2024-001',
    '123', 'Mabini Street', 'San Antonio Village', 'Poblacion', 'Makati', 'Metro Manila', '1210',
    '123', 'Mabini Street', 'San Antonio Village', 'Poblacion', 'Makati', 'Metro Manila', '1210',
    '02-8123-4567', '09171234567', 'juan.delacruz@email.com'
);

-- ============================================
-- Verify Installation
-- ============================================

-- Show table structure
DESCRIBE personal_data;

-- Show record count
SELECT COUNT(*) as TotalRecords FROM personal_data;

-- ============================================
-- Additional Useful Queries
-- ============================================

-- View all records
-- SELECT * FROM personal_data ORDER BY Id DESC;

-- Search by name
-- SELECT * FROM personal_data WHERE Surname LIKE '%Cruz%' OR FirstName LIKE '%Juan%';

-- Filter by sex
-- SELECT * FROM personal_data WHERE Sex = 'Male';

-- Recent additions (last 30 days)
-- SELECT * FROM personal_data WHERE CreatedAt >= DATE_SUB(NOW(), INTERVAL 30 DAY);

-- ============================================
-- Database Information
-- ============================================
-- Database: personal_data_db
-- Table: personal_data
-- Character Set: utf8mb4
-- Collation: utf8mb4_unicode_ci
-- Engine: InnoDB
-- ============================================