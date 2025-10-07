<?php
header("Content-Type: application/json");

$file = "lost-and-found.json";
$method = $_SERVER['REQUEST_METHOD'];

// Helper: Load JSON file
function loadData($file) {
    // Auto-create the file if it doesn't exist
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([]));
    }
    return json_decode(file_get_contents($file), true) ?? [];
}

// Helper: Save JSON file
function saveData($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

switch ($method) {
    case "GET":
        $items = loadData($file);
        echo json_encode(["status" => "success", "data" => $items]);
        break;

    case "POST":
        $items = loadData($file);
        $input = json_decode(file_get_contents("php://input"), true);

        // Validate required fields
        if (empty($input['item_name']) || empty($input['status'])) {
            echo json_encode(["status" => "error", "message" => "Missing fields: item_name and status are required"]);
            exit;
        }

        // Create new item
        $newId = empty($items) ? 1 : end($items)['id'] + 1;
        $newItem = [
            "id" => $newId,
            "item_name" => $input['item_name'],
            "description" => $input['description'] ?? "",
            "status" => $input['status'], // lost or found
            "reported_by" => $input['reported_by'] ?? "Anonymous",
            "date_reported" => date("Y-m-d H:i:s")
        ];

        $items[] = $newItem;
        saveData($file, $items);

        echo json_encode(["status" => "success", "message" => "Item added", "item" => $newItem]);
        break;

    case "PUT":
        $items = loadData($file);
        $input = json_decode(file_get_contents("php://input"), true);

        if (!isset($input['id'])) {
            echo json_encode(["status" => "error", "message" => "Missing item ID"]);
            exit;
        }

        $updated = false;
        foreach ($items as &$item) {
            if ($item['id'] == $input['id']) {
                $item['item_name']   = $input['item_name'] ?? $item['item_name'];
                $item['description'] = $input['description'] ?? $item['description'];
                $item['status']      = $input['status'] ?? $item['status'];
                $item['reported_by'] = $input['reported_by'] ?? $item['reported_by'];
                $updated = true;
                break;
            }
        }

        if ($updated) {
            saveData($file, $items);
            echo json_encode(["status" => "success", "message" => "Item updated"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Item not found"]);
        }
        break;

    case "DELETE":
        $items = loadData($file);
        $input = json_decode(file_get_contents("php://input"), true);

        if (!isset($input['id'])) {
            echo json_encode(["status" => "error", "message" => "Missing item ID"]);
            exit;
        }

        $newItems = array_filter($items, fn($item) => $item['id'] != $input['id']);

        if (count($newItems) < count($items)) {
            saveData($file, array_values($newItems));
            echo json_encode(["status" => "success", "message" => "Item deleted"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Item not found"]);
        }
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Method not allowed"]);
}
?>
