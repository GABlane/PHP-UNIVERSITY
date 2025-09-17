Personal Data Sheet System
A complete PHP-based Personal Data Sheet (PDS) system with full CRUD functionality (Create, Read, Update, Delete).

Features
Add New Records: Complete personal information form
View Records: Detailed view of personal data
Edit Records: Update existing information
Delete Records: Remove records with confirmation
List All Records: Table view of all personal data entries
Duplicate Prevention: Prevents duplicate entries based on name and birthdate
Responsive Design: Bootstrap-styled interface
Files Included
forms.php - Main form for adding/editing personal data
view.php - Detailed view of a specific record
del.php - Delete handler for removing records
config.php - Database configuration
create_table.sql - Database schema
Installation Instructions
1. Database Setup
Create a new MySQL database named personal_data_db
Run the SQL script from create_table.sql to create the required table
Or use phpMyAdmin to import the SQL file
2. File Configuration
Place all PHP files in your web server directory (htdocs, www, etc.)
Update config.php with your database credentials:
php
   $host = "localhost";        // Your database host
   $username = "root";         // Your database username
   $password = "";             // Your database password
   $database = "personal_data_db"; // Your database name
3. Web Server Setup
Ensure you have:

PHP 7.0 or higher
MySQL 5.6 or higher
Web server (Apache/Nginx)
4. Access the System
Open your web browser
Navigate to: http://localhost/your-folder-name/forms.php
Start adding personal data records
Usage
Adding a New Record
Fill in all required fields in the form
Click "SAVE INFORMATION"
The system will prevent duplicate entries
Viewing a Record
Click the "View" button next to any record in the table
See complete formatted information
Editing a Record
Click the "Edit" button next to any record
Modify the information
Click "UPDATE INFORMATION"
Deleting a Record
Click the "Delete" button next to any record
Confirm the deletion in the popup
Form Fields
The system includes all standard PDS fields:

Personal Information (Name, Birth Date, etc.)
Physical Characteristics (Height, Weight, Blood Type)
Government IDs (GSIS, PAG-IBIG, PhilHealth, SSS, TIN)
Addresses (Residential and Permanent)
Contact Information (Phone, Mobile, Email)
Security Notes
The system uses basic SQL queries (consider using prepared statements for production)
Implement proper user authentication for production use
Add input validation and sanitization as needed
Use HTTPS in production environments
Customization
You can easily customize:

Form fields by modifying the table structure
Styling by updating the CSS classes
Validation rules by adding JavaScript or PHP validation
Additional features like search, pagination, or export functionality
Browser Compatibility
Chrome (recommended)
Firefox
Safari
Edge
Internet Explorer 11+
Support
For issues or questions, please check:

Database connection settings
File permissions
PHP error logs
Browser console for JavaScript errors
