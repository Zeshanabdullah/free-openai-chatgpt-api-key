<?php
// Define the prompt to be sent
$prompt = 'Please generate a simple blog post according to this title "What is CHATGPT"';

// Enter E-mail to generate API
// Get API Key from: https://hdstockimages.com/get-free-openai-chatgpt-api/
$apiKey = 'Enter your E-mail Address to get the free ChatGPT API';

// Define the default model if none is specified
$defaultModel = 'gpt-3.5-turbo';

// Uncomment the model you want to use, and comment out the others
// $model = 'gpt-4';
// $model = 'gpt-4-32k';
// $model = 'gpt-3.5-turbo-0125';
$model = $defaultModel;

// Build the URL to call
$apiUrl = 'http://195.179.229.119/gpt/api.php?prompt=' . urlencode($prompt) . '&api_key=' . urlencode($apiKey) . '&model=' . urlencode($model);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    echo 'cURL Error: ' . htmlspecialchars(curl_error($ch));
} else {
    $data = json_decode($response, true);
    print_r($data);
}

// Close the cURL session
curl_close($ch);
?>
