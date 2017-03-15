<?php
    // Import review form
?>

<h1>Importing Review for Mesa Write a Review Form</h1>
<p>Note: <br />
    - The file you are importing must be CSV file which you export from Excel in following format: Date, Name, Star, Comments, Email <br />
    - The first row will be ignored <br />
    - If you leave email column blank, it uses 'import.default@gmail.com' as default value <br />
    Ex: MM/DD/YYYY, "John Doe", 5, "This is my comment", "john.example@email.com"

</p>
<hr/>

<?php if(isset($error_message) && !empty($error_message)): ?>
<p class="well" style="<?php if ($error_flag) echo 'background: lightcoral;'; else echo 'background: lightblue;' ?> padding: 10px; width: 50%;">
    <?php echo esc_html($error_message); ?>
</p>
<?php endif; ?>

<form method="POST" enctype= "multipart/form-data">
    <h3>Select CSV file to upload: </h3>

    <p style="background: white; width: 50%;">
        <input type="file" name="review_file" id="review-file-upload" />
    </p>

    <p>
        <input type="submit" name="upload_review" value="Upload CSV File" class="button button-primary" />
    </p>

</form>
