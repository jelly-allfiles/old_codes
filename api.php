<?php
$file = "/lost_items.json";

// If file doesn't exist, create it with some default lost items
if (!file_exists($file)) {
    $defaultItems = [
        ["id" => 1, "item" => "Umbrella", "location" => "Library", "status" => "Unclaimed"],
        ["id" => 2, "item" => "ID Card", "location" => "Canteen", "status" => "Claimed"],
        ["id" => 3, "item" => "Notebook", "location" => "Room 203", "status" => "Unclaimed"]
    ];
    file_put_contents($file, json_encode($defaultItems, JSON_PRETTY_PRINT));
}

// Load items from file
$items = json_decode(file_get_contents($file), true);

// Handle GET request => return list of lost items
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    echo json_encode($items, JSON_PRETTY_PRINT);
    exit;
}

// Handle POST request => add new lost item
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data["item"]) && isset($data["location"])) {
        $newItem = [
            "id" => count($items) + 1,
            "item" => $data["item"],
            "location" => $data["location"],
            "status" => "Unclaimed"
        ];

        $items[] = $newItem;
        file_put_contents($file, json_encode($items, JSON_PRETTY_PRINT));
        echo json_encode(["message" => "Item added successfully"]);
        exit;
    } else {
        echo json_encode(["error" => "Missing item or location"]);
        exit;
    }
}
?>