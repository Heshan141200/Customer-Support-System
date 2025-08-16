<?php
include 'header.php';

$configFile = 'config.json';

function getSettings($filePath) {
    if (file_exists($filePath)) {
        $settings = file_get_contents($filePath);
        return json_decode($settings, true);
    } else {
        return [
            'dark_mode' => false,
            'email_notifications' => true,
            'maintenance_mode' => false
        ];
    }
}

function saveSettings($filePath, $settings) {
    file_put_contents($filePath, json_encode($settings, JSON_PRETTY_PRINT));
}


$settings = getSettings($configFile);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $settings['dark_mode'] = isset($_POST['dark_mode']) ? true : false;
    $settings['email_notifications'] = isset($_POST['email_notifications']) ? true : false;
    $settings['maintenance_mode'] = isset($_POST['maintenance_mode']) ? true : false;

    
    saveSettings($configFile, $settings);
    echo "<p>Settings updated successfully.</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Settings</title>
    <style>
        
        body {
            background-color: white;
            color: black;
            font-family: Arial, sans-serif;
        }

       
        <?php if ($settings['dark_mode']): ?>
        body {
            background-color: black;
            color: white;
        }
        <?php endif; ?>
        
        h2 {
            margin-bottom: 10px;
        }

        label {
            margin-bottom: 10px;
            display: block;
            color:blue;
        }

        button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<main>
    <h2>System Settings</h2>
    <p>Manage your system configuration and settings from this panel.</p>
    
   
    <form method="POST" action="">
        <label>
            <input type="checkbox" name="dark_mode" <?php if ($settings['dark_mode']) echo 'checked'; ?>> Dark Mode
        </label>

        <label>
            <input type="checkbox" name="email_notifications" <?php if ($settings['email_notifications']) echo 'checked'; ?>> Email Notifications
        </label>

        <label>
            <input type="checkbox" name="maintenance_mode" <?php if ($settings['maintenance_mode']) echo 'checked'; ?>> Maintenance Mode
        </label>

        <button type="submit">Save Settings</button>
    </form>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
