<!DOCTYPE html>
<html>
<head>
    <title>New Employee Added</title>
</head>
<body>
    <h1>New Employee Added</h1>
    <p>Hello,</p>
    <p>A new employee has been added:</p>
    <p>Name: {{ $employeeName }}</p>
    <p>Email: {{ $employee->email }}</p>
    <p>Phone: {{ $employee->phone }}</p>
    <p>Best regards,</p>
    <p>Your Company</p>
</body>
</html>
