<?php
/**
 * Simulated Database
 * 
 * In a production app, this would be MySQL/MariaDB/PostgreSQL.
 * Here, we provide an in-memory mock database of registered users
 * so the application runs immediately without any database server
 * installation, credentials, or configuration.
 */

$database = [
    [
        'username' => 'admin',
        'password' => 'admin123',
        'fullname' => 'System Administrator',
        'email'    => 'admin@college.edu',
        'role'     => 'Administrator'
    ],
    [
        'username' => 'student',
        'password' => 'college2026',
        'fullname' => 'Rahul Sharma',
        'email'    => 'rahul.s@college.edu',
        'role'     => 'Student'
    ],
    [
        'username' => 'luvkush',
        'password' => 'password123',
        'fullname' => 'Luvkush Sharma',
        'email'    => 'luvkush@college.edu',
        'role'     => 'Student'
    ],
    [
        'username' => '24btrsn022',
        'password' => 'password123',
        'fullname' => 'Luvkush Sharma',
        'email'    => '24btrsn022@college.edu',
        'role'     => 'Student (24BTRSN022)'
    ],
    [
        'username' => 'prof_smith',
        'password' => 'teach2026',
        'fullname' => 'Prof. Alan Smith',
        'email'    => 'smith@college.edu',
        'role'     => 'Faculty'
    ]
];

/**
 * Validates user credentials against the database records.
 *
 * @param string $username
 * @param string $password
 * @param array $database
 * @return array|false Returns user data array on success, false on failure.
 */
function authenticate_user($username, $password, $database) {
    $trimmed_username = trim($username);
    $trimmed_password = trim($password);

    if (empty($trimmed_username) || empty($trimmed_password)) {
        return false;
    }

    foreach ($database as $user) {
        // Case-sensitive check for credentials
        if ($user['username'] === $trimmed_username && $user['password'] === $trimmed_password) {
            return $user;
        }
    }

    return false;
}
