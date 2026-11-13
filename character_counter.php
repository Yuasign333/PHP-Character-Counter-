<!DOCTYPE HTML> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Character Counter</title> 
</head> 
<body style="font-family: 'Poppins', sans-serif; line-height:1.8; max-width:900px; margin:40px auto; background-color:#edf7f1; text-align:center; padding:0 20px;"> 
    
    <!-- Page Title -->
    <h1 style="color:#1b4332;">Character Counter</h1> 
    
    <!-- Input Form Section -->
    <form method="POST" action="" style="background-color:white; padding:20px; border-radius:8px; max-width:600px; margin:0 auto; text-align:center; border-top: 4px solid #2d6a4f;"> 
        <h3 style="color:#2d6a4f;">Type Any Text or Sentence</h3> 
        <b style="color:#1b4332;">Input a sentence: </b> 
        <input type="text" name="sentence" id="wordInput" style="width:50%; padding:8px; border:1px solid #95d5b2; border-radius:4px;" required> 
        <br><br><hr style="border: 0; border-top: 1px solid #d8f3dc;"><br> 
        <input type="submit" value="Check" style="background-color:#2d6a4f; color:white; padding:10px 15px; border:none; border-radius:4px; width:49%; cursor:pointer;"> 
        <input type="reset" value="Clear" onclick="document.getElementById('display').innerHTML=''" style="background-color:#74c69d; color:#1b4332; padding:10px 15px; border:none; border-radius:4px; width:49%; cursor:pointer;"> 
    </form> 

    <!-- Results Display Section -->
    <div id="display" style="max-width:600px; margin:20px auto; font-size:1.1em; background-color:white; padding:15px; border-radius:8px; color:#1b4332;">
     
     <?php
        // Predefined PHP superglobal check: verifies if the form was submitted via POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the user's input
            $sentence = $_POST['sentence'];
            
            // Total number of characters using strlen()
            $charCount = strlen($sentence);
            
            // Total number of words using str_word_count()
            $wordCount = str_word_count($sentence);
            
            // Number of vowels using substr_count() (converted to lowercase to catch both cases)
            $lowerSentence = strtolower($sentence);
            $vowelCount = substr_count($lowerSentence, 'a') + 
                          substr_count($lowerSentence, 'e') + 
                          substr_count($lowerSentence, 'i') + 
                          substr_count($lowerSentence, 'o') + 
                          substr_count($lowerSentence, 'u');

            // Display the results
            echo "<p><b>Original Sentence:</b> " . htmlspecialchars($sentence) . "</p>";
            echo "<p><b>Total Characters:</b> " . $charCount . "</p>";
            echo "<p><b>Total Words:</b> " . $wordCount . "</p>";
            echo "<p><b>Number of Vowels:</b> " . $vowelCount . "</p>";
        }

      ?>

    </div> 

    <!-- Footer Note -->
    <h4 style="color:#2d6a4f; font-weight:normal; font-size:0.9em;"><i>Note: Spaces, numbers, and special characters count toward total characters, but not words or vowels.</i></h4>

</body> 
</html>
