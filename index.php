<?php

function encrypt($plaintext) {
    $encryptionKey = array(
        'a' => '2',
        'b' => '7',
        'c' => '1',
        'd' => '9',
        'e' => '4',
        'f' => '3',
        'g' => '8',
        'h' => '5',
        'i' => '0',
        'j' => '6',
        'k' => '#',
        'l' => '*',
        'm' => '$',
        'n' => '@',
        'o' => '!',
        'p' => '(',
        'q' => ')',
        'r' => '&',
        's' => '-',
        't' => '+',
        'u' => '/',
        'v' => ':',
        'w' => ';',
        'x' => '%',
        'y' => '^',
        'z' => '~',
    );

    $ciphertext = '';
    $plaintext = strtolower($plaintext);

    for ($i = 0; $i < strlen($plaintext); $i++) {
        $char = $plaintext[$i];

        if (array_key_exists($char, $encryptionKey)) {
            $ciphertext .= $encryptionKey[$char];
        } else {
            $ciphertext .= $char;
        }
    }

    return $ciphertext;
}

function decrypt($ciphertext) {
    $decryptionKey = array(
        '2' => 'a',
        '7' => 'b',
        '1' => 'c',
        '9' => 'd',
        '4' => 'e',
        '3' => 'f',
        '8' => 'g',
        '5' => 'h',
        '0' => 'i',
        '6' => 'j',
        '#' => 'k',
        '*' => 'l',
        '$' => 'm',
        '@' => 'n',
        '!' => 'o',
        '(' => 'p',
        ')' => 'q',
        '&' => 'r',
        '-' => 's',
        '+' => 't',
        '/' => 'u',
        ':' => 'v',
        ';' => 'w',
        '%' => 'x',
        '^' => 'y',
        '~' => 'z',
    );

    $plaintext = '';

    for ($i = 0; $i < strlen($ciphertext); $i++) {
        $char = $ciphertext[$i];

        if (array_key_exists($char, $decryptionKey)) {
            $plaintext .= $decryptionKey[$char];
        } else {
            $plaintext .= $char;
        }
    }

    return $plaintext;
}

// Menangani input dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = isset($_POST["plaintext"]) ? $_POST["plaintext"] : "";
    $ciphertext = encrypt($userInput);
    $decryptedText = decrypt($ciphertext);
} else {
    // Atur nilai default
    $userInput = "";
    $ciphertext = "";
    $decryptedText = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enkripsi Dekripsi Teks</title>
</head>

<body>
    <h1>Enkripsi Dekripsi Teks</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="plaintext">Masukkan Teks:</label>
        <input type="text" id="plaintext" name="plaintext" value="<?php echo htmlspecialchars($userInput); ?>">
        <input type="submit" value="Enkripsi">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <p>Plaintext: <?php echo htmlspecialchars($userInput); ?></p>
        <p>Ciphertext: <?php echo htmlspecialchars($ciphertext); ?></p>
        <p>Decrypted Text: <?php echo htmlspecialchars($decryptedText); ?></p>
    <?php endif; ?>
</body>

</html>
