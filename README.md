# RBS Absen Dosen Geocode

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
</p>

## 📋 Table of Contents

- [About](#about)
- [Key Features](#key-features)
- [Technology Stack](#technology-stack)
- [Installation](#installation)
- [Configuration](#configuration)
- [User Roles & Permissions](#user-roles--permissions)
- [Core Modules](#core-modules)
- [API Documentation](#api-documentation)
- [Screenshots](#screenshots)
- [Contributing](#contributing)
- [License](#license)

## 🎯 About

**RBS Absen Dosen Geocode** is a comprehensive web-based attendance management system designed specifically for educational institutions. The system enables real-time attendance tracking for teachers/lecturers using geolocation technology to ensure physical presence verification. Built with Laravel framework, it provides a robust, scalable, and user-friendly solution for academic attendance management.

### 🎨 Design Philosophy

The application features a sophisticated **Academic Design System** with:
- **Professional Color Palette**: Deep academic blue (#1e3a8a) with complementary academic gold accents
- **Typography System**: Google Fonts integration (Inter + Crimson Text) for professional academic presentation
- **Enhanced Visual Hierarchy**: Consistent design language across all user interfaces
- **Responsive Design**: Optimized for desktop, tablet, and mobile devices

## ✨ Key Features

### 🔐 Authentication & Authorization
- **Multi-role Authentication**: Secure login system for Admin, Teacher, and Principal roles
- **Role-based Access Control**: Different permissions and interfaces for each user type
- **Session Management**: Secure user session handling with proper logout functionality

### 📍 Geolocation-Based Attendance
- **Real-time Location Tracking**: GPS coordinates capture for attendance verification
- **Geofence Validation**: Configurable radius-based location verification using Haversine formula
- **Attendance Status**: Automatic status determination (Present/Outside Geofence)
- **Manual Notes**: Teachers can add contextual notes to attendance records

### 👥 User Management
- **User CRUD Operations**: Complete user lifecycle management
- **Profile Management**: User profile customization and settings
- **Role Assignment**: Flexible role assignment and management
- **Bulk Operations**: Efficient bulk user management capabilities

### 📚 Academic Management
- **Subject Management**: Create and organize academic subjects with unique codes
- **Class Management**: Organize students into different class groups
- **Schedule Management**: Comprehensive scheduling system with:
  - Teacher assignment
  - Subject-class mapping
  - Time slot management (start/end times)
  - Day-of-week scheduling
  - Conflict detection

### 📊 Advanced Reporting System
- **Multi-format Reports**: Generate reports in PDF and Excel formats
- **Attendance Analytics**: Detailed attendance statistics and trends
- **User-specific Reports**: Individual attendance reports for teachers
- **Administrative Reports**: Comprehensive institutional attendance overview
- **Date Range Filtering**: Custom date range report generation
- **Export Capabilities**: Easy data export for external analysis

### 🎛️ Role-Specific Dashboards

#### 🔧 Administrator Dashboard
- **System Statistics**: Real-time system usage and attendance metrics
- **User Management**: Complete user administration interface
- **Academic Configuration**: Subject, class, and schedule management
- **Location Settings**: Geofence configuration and management
- **System Reports**: Comprehensive attendance and usage reports

#### 👨‍🏫 Teacher Dashboard
- **Personal Schedule**: View assigned classes and time slots
- **Quick Attendance**: One-click attendance marking with location verification
- **Attendance History**: Personal attendance tracking and history
- **Schedule Overview**: Weekly/monthly schedule visualization

#### 🏛️ Principal Dashboard
- **Institutional Overview**: School-wide attendance statistics
- **Faculty Management**: Overview of all teachers and their attendance
- **Comprehensive Reports**: Access to all institutional reports
- **Performance Analytics**: Teacher and institutional performance metrics

### ⚙️ System Configuration
- **Location Settings**: Configure school coordinates and allowed radius
- **System Parameters**: Customize system behavior and preferences
- **Notification Settings**: Configure system notifications and alerts
- **Backup & Maintenance**: System maintenance and data backup tools

## 🛠️ Technology Stack

### Backend
- **Framework**: Laravel 12.x
- **Language**: PHP 8.2+
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel's built-in authentication
- **PDF Generation**: DomPDF (barryvdh/laravel-dompdf)
- **Excel Export**: Maatwebsite Excel

### Frontend
- **Template Engine**: Blade Templates
- **CSS Framework**: Custom Academic Design System
- **JavaScript**: Vanilla JavaScript with modern ES6+
- **Icons**: FontAwesome 6.x
- **Typography**: Google Fonts (Inter + Crimson Text)
- **Maps**: JavaScript Geolocation API

### Development Tools
- **Dependency Management**: Composer & NPM
- **Build Tools**: Vite
- **Version Control**: Git
- **Code Style**: Laravel Pint
- **Testing**: PHPUnit

## 🚀 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL/PostgreSQL
- Web server (Apache/Nginx)

### Step-by-Step Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/altf4m88/rbs-absen-dosen-geocode.git
   cd rbs-absen-dosen-geocode
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js Dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Configuration**
   Edit `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=rbs_absen_dosen
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed Database (Optional)**
   ```bash
   php artisan db:seed
   ```

8. **Build Frontend Assets**
   ```bash
   npm run build
   ```

9. **Start Development Server**
   ```bash
   php artisan serve
   ```

## ⚙️ Configuration

### Location Settings
Configure the geofence parameters in the application:

1. Login as Administrator
2. Navigate to Settings > Location Settings
3. Set the following parameters:
   - **Latitude**: School's latitude coordinate
   - **Longitude**: School's longitude coordinate
   - **Radius**: Allowed distance in meters for attendance

### User Setup
1. Create initial admin user through database seeding or registration
2. Admin can then create Teacher and Principal accounts
3. Assign appropriate roles to users

## 👨‍💼 User Roles & Permissions

### 🔧 Administrator
- **Full System Access**: Complete control over all system features
- **User Management**: Create, update, delete users and assign roles
- **Academic Management**: Manage subjects, classes, and schedules
- **System Configuration**: Configure system settings and parameters
- **Reports Access**: Generate and view all types of reports
- **Location Management**: Configure geofence settings

### 👨‍🏫 Teacher
- **Attendance Management**: Mark attendance with location verification
- **Schedule Viewing**: View personal teaching schedule
- **Attendance History**: Access personal attendance records
- **Profile Management**: Update personal profile information

### 🏛️ Principal
- **Institutional Overview**: View school-wide attendance statistics
- **Reports Access**: Generate institutional and teacher-specific reports
- **Faculty Monitoring**: Monitor teacher attendance and performance
- **Data Export**: Export attendance data in various formats

## 📱 Core Modules

### 🎓 Academic Management Module
- **Subject Management**: CRUD operations for academic subjects
- **Class Management**: Organize students into classes
- **Schedule Management**: Create and manage class schedules
- **Teacher Assignment**: Assign teachers to subjects and classes

### 📍 Attendance Module
- **Real-time Tracking**: GPS-based attendance marking
- **Geofence Validation**: Location verification against configured parameters
- **Status Management**: Automatic status determination and manual overrides
- **History Tracking**: Comprehensive attendance history management

### 📊 Reporting Module
- **Dynamic Reports**: Generate reports based on various criteria
- **Export Functionality**: PDF and Excel export capabilities
- **Analytics Dashboard**: Visual representation of attendance data
- **Custom Date Ranges**: Flexible date range selection for reports

### 🔧 System Administration Module
- **User Management**: Complete user lifecycle management
- **Role Management**: Flexible role assignment and permission control
- **System Configuration**: Configure system parameters and settings
- **Maintenance Tools**: System maintenance and data management tools

## 📋 API Documentation

### Authentication Endpoints
- `POST /login` - User authentication
- `POST /logout` - User logout

### Admin Endpoints
- `GET /admin/dashboard` - Admin dashboard data
- `GET|POST /admin/users` - User management
- `GET|POST /admin/subjects` - Subject management
- `GET|POST /admin/schedules` - Schedule management

### Teacher Endpoints
- `GET /teacher/dashboard` - Teacher dashboard
- `GET /teacher/schedule` - View personal schedule
- `POST /teacher/attendance` - Mark attendance
- `GET /teacher/attendance/history` - Attendance history

### Principal Endpoints
- `GET /principal/dashboard` - Principal dashboard
- `GET /principal/reports` - Institutional reports
- `GET /principal/reports/download` - Export reports

## 🎨 Screenshots

*Note: Screenshots showcase the professional academic design system implemented throughout the application.*

### 🏠 Landing Page
- Institutional welcome page with academic hero section
- Feature highlights and system statistics
- Professional academic presentation

### 🎛️ Dashboard Interfaces
- **Admin Dashboard**: System management with enhanced cards and statistics
- **Teacher Dashboard**: Personal workspace with quick actions
- **Principal Dashboard**: Institutional overview with comprehensive reporting

### 📝 Forms & Management
- **User Management**: Professional table layouts with enhanced data presentation
- **Schedule Management**: Intuitive scheduling interface with time slot management
- **Attendance Forms**: Location-aware attendance marking interface

## 🤝 Contributing

We welcome contributions to improve the RBS Absen Dosen Geocode system! Here's how you can contribute:

### Getting Started
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Contribution Guidelines
- Follow PSR-12 coding standards
- Write clear commit messages
- Include tests for new features
- Update documentation as needed
- Ensure all tests pass before submitting

### Development Setup
```bash
# Install development dependencies
composer install --dev
npm install --dev

# Run code style checks
./vendor/bin/pint

# Run tests
php artisan test
```

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- **Laravel Framework**: For providing an excellent foundation for web applications
- **Academic Community**: For inspiration in creating an educational-focused design system
- **Open Source Libraries**: For the various packages that make this system possible

## 📞 Support

For support, feature requests, or bug reports:

- **Issues**: [GitHub Issues](https://github.com/altf4m88/rbs-absen-dosen-geocode/issues)
- **Discussions**: [GitHub Discussions](https://github.com/altf4m88/rbs-absen-dosen-geocode/discussions)
- **Documentation**: Check this README and inline code documentation

## 🚀 Future Roadmap

- [ ] **Mobile Application**: Native mobile apps for iOS and Android
- [ ] **Push Notifications**: Real-time notifications for attendance reminders
- [ ] **Advanced Analytics**: Machine learning-based attendance predictions
- [ ] **Integration APIs**: Third-party system integration capabilities
- [ ] **Multi-language Support**: Internationalization for global use
- [ ] **Offline Capability**: Offline attendance marking with sync capabilities

---

<p align="center">
    <strong>Built with ❤️ for Educational Institutions</strong>
</p>
