<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Character Counter</title>

    <style>
        /* ---------- Page ---------- */
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.8;
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
            background-color: #edf7f1;
            text-align: center;
        }

        h1 {
            color: #1b4332;
        }

        /* ---------- Input form ---------- */
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            border-top: 4px solid #2d6a4f;
            text-align: center;
        }

        form h3 {
            color: #2d6a4f;
        }

        label {
            font-weight: bold;
            color: #1b4332;
        }

        #wordInput {
            width: 50%;
            padding: 8px;
            border: 1px solid #95d5b2;
            border-radius: 4px;
        }

        hr {
            border: 0;
            border-top: 1px solid #d8f3dc;
        }

        /* ---------- Buttons ---------- */
        input[type="submit"],
        input[type="reset"] {
            width: 49%;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #2d6a4f;
            color: white;
        }

        input[type="reset"] {
            background-color: #74c69d;
            color: #1b4332;
        }

        /* ---------- Results ---------- */
        #display {
            max-width: 600px;
            margin: 20px auto;
            padding: 15px;
            background-color: white;
            border-radius: 8px;
            color: #1b4332;
            font-size: 1.1em;
        }

        /* ---------- Footer note ---------- */
        .note {
            color: #2d6a4f;
            font-weight: normal;
            font-size: 0.9em;
        }
    </style>
</head>

<body>

    <!-- Page title -->
    <h1>Character Counter</h1>

    <!-- Input form: sends the sentence to this same page using POST -->
    <form method="POST" action="">
        <h3>Type Any Text or Sentence</h3>

        <label for="wordInput">Input a sentence:</label>
        <input type="text" name="sentence" id="wordInput" required>

        <br><br>
        <hr>
        <br>

        <input type="submit" value="Check">

        <!-- Clear also empties the results box -->

        <input type="reset" value="Clear" onclick="document.getElementById('display').innerHTML=''">

    </form>

    <!-- Results display -->
    <div id="display">

        <?php

        // Run only when the form was submitted with POST

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Get the user's input (empty string if the field is missing)
            $sentence = $_POST['sentence'] ?? '';

            // Total number of characters (spaces, numbers and symbols included)
            $charCount = strlen($sentence);

            // Total number of words (letters only, numbers are not counted)
            $wordCount = str_word_count($sentence);

            // Number of vowels: lowercase first so A and a are both counted
            $lowerSentence = strtolower($sentence);

            $vowelCount = 0;

            foreach (['a', 'e', 'i', 'o', 'u'] as $vowel) 
            {
                $vowelCount += substr_count($lowerSentence, $vowel);
            }

            // Show the results (htmlspecialchars keeps the output safe)
            echo "<p><b>Original Sentence:</b> " . htmlspecialchars($sentence) . "</p>";
            echo "<p><b>Total Characters:</b> " . $charCount . "</p>";
            echo "<p><b>Total Words:</b> " . $wordCount . "</p>";
            echo "<p><b>Number of Vowels:</b> " . $vowelCount . "</p>";
        }

        ?>
            
    </div>

    <!-- Footer note -->
    <h4 class="note"><i>Note: Spaces, numbers, and special characters count toward total characters, but not words or vowels.</i></h4>

</body>
</html>
