<?php
require __DIR__ . '/../src/Scanner.php';
require __DIR__ . '/../src/IpInfo.php';

use NetScan\Scanner;
use NetScan\IpInfo;

$host = $_GET['ip'] ?? '8.8.8.8';

$scanner = new Scanner();
$ipInfo = new IpInfo();

$scanResults = $scanner->scan($host);
$info = $ipInfo->fetch($host);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>NetScan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light p-5">
<div class="container">
    <h1 class="mb-4">NetScan</h1>
    <form method="get" class="mb-3">
        <label>
            <input type="text" name="ip" value="<?= htmlspecialchars($host) ?>" class="form-control" placeholder="Enter IP or Host">
        </label>
        <button class="btn btn-primary mt-2">Scan</button>
    </form>
    <h3>IP Information</h3>
    <ul class="list-group mb-4">
        <li class="list-group-item">IP: <?= $info['query'] ?? $host ?></li>
        <li class="list-group-item">Country: <?= $info['country'] ?? 'Unknown' ?></li>
        <li class="list-group-item">City: <?= $info['city'] ?? 'Unknown' ?></li>
        <li class="list-group-item">ISP: <?= $info['isp'] ?? 'Unknown' ?></li>
    </ul>
    <h3>Port Scan Results</h3>
    <table class="table table-dark table-bordered">
        <thead>
        <tr>
            <th>Port</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($scanResults as $port => $status): ?>
            <tr>
                <td><?= $port ?></td>
                <td class="<?= $status === 'open' ? 'text-success' : 'text-danger' ?>">
                    <?= ucfirst($status) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
