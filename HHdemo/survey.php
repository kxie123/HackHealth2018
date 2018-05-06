<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrescribeAwareSurvey</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="contact-clean" style="background-color:rgb(184,209,230);">
	
        <form action = "surveydb.php" method="post">
			
            <h2 class="text-center">PrescribeAware Survey</h2>
			
			<?php include("errors.php"); ?>
            <div class="form-group"><label>1. Do you feel that the condition for which you were seen has improved as the result of the care you received?</label>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate1" value="1" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Not at all</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" checked type="radio" name="rate1" value="2" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Somewhat improed</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate1" value="3" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Very much improved</label></div>
            </div>
			<div class="form-group"><label>2. How satisfied are you with your post-procedure pain control?(1 being very unatisfied)</label>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate2" value="1" id="formCheck-1"><label class="form-check-label" for="formCheck-1">1</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate2" value="2" id="formCheck-1"><label class="form-check-label" for="formCheck-1">2</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" checked type="radio" name="rate2" value="3" id="formCheck-1"><label class="form-check-label" for="formCheck-1">3</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate2" value="4" id="formCheck-1"><label class="form-check-label" for="formCheck-1">4</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate2" value="5" id="formCheck-1"><label class="form-check-label" for="formCheck-1">5</label></div>
            </div>
            <div class="form-group"><label>3. How many of the opioid pain pills you were prescribed have you used to relieve your pain?</label><input class="form-control" type="number" name = "quantity" required="" placeholder="Number" min="0" style="width:103px;"></div>
			<div class="form-group"><label>4. Using any number from 1 to 5, where 1 is the worst provider possible and 5 is the best provider possible, what number would you use to rate your healthcare provider?</label>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate3" value="1" id="formCheck-1"><label class="form-check-label" for="formCheck-1">1</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate3" value="2" id="formCheck-1"><label class="form-check-label" for="formCheck-1">2</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" checked type="radio" name="rate3" value="3" id="formCheck-1"><label class="form-check-label" for="formCheck-1">3</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate3" value="4" id="formCheck-1"><label class="form-check-label" for="formCheck-1">4</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate3" value="5" id="formCheck-1"><label class="form-check-label" for="formCheck-1">5</label></div>
            </div>
			<div class="form-group"><label>5. How likely are you to recommend your healthcare provider’s office to your family and friends? (1 being very unlikely)</label>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate4" value="1" id="formCheck-1"><label class="form-check-label" for="formCheck-1">1</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate4" value="2" id="formCheck-1"><label class="form-check-label" for="formCheck-1">2</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" checked type="radio" name="rate4" value="3" id="formCheck-1"><label class="form-check-label" for="formCheck-1">3</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate4" value="4" id="formCheck-1"><label class="form-check-label" for="formCheck-1">4</label></div>
                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="rate4" value="5" id="formCheck-1"><label class="form-check-label" for="formCheck-1">5</label></div>
            </div>
            <div class="form-group"><label>6. Is there any feedback you would like to provide the health system?</label><textarea class="form-control" rows="14" name="message" placeholder="Message"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" name = "survey" type="submit">send </button></div>
        </form>
		

    </div>
    <!--<script src="assets/js/jquery.min.js"></script>-->
    <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>-->
</body>

</html>