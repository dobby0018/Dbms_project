
<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body><?php
echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';?>
    <img class="logo" src="img/logo.jpeg">
    <img class="wave" src="img/wave.png">
    <div class="container2">  
        <div class="img"> 
            <img src="img/course.png">
        </div>
        <div class="login-content-deatil">
            <header>
                <i class="bx bxs-check-shield"></i>
            </header>
            <form action="welcome.php" method ="post">
                <h1>User Details</h1>
                <div class="input-qua">
                    <label for="qualification" style="margin-right: 10px;"><h3>Select Qualification :</h3></label>
                    <select id="qualification" name="qualification">
                        <option value="" selected disabled>- SELECT -</option>
                        <option value="1">10th</option>
                        <option value="2">12th</option>
                        <option value="3">Graduation</option>
                        <option value="4">Post Graduation</option>
                        <option value="5">Diploma</option>
                        <option value="6">Others</option>
                    </select>
                </div>
                <div>
                    <h1>Select Your Interests</h1>
                    <div class="checkbox-group" id="interests-container">
                        <div class="checkbox-box"><input type="checkbox" name="interest" value="Coding">Coding</div>

                        <div class="checkbox-box"><input type="checkbox" name="interest" value="Web_Dev">Web Devolopment</div>

                        <div class="checkbox-box"><input type="checkbox" name="interest" value="Technical_Writing">Technical Writing</div>

                        <div class="checkbox-box"><input type="checkbox" name="interest" value="UI">UI UX</div>

                        <div class="checkbox-box"><input type="checkbox" name="interest" value="Mathematics">Mathematics</div>

                        <div class="checkbox-box"><input type="checkbox" name="interest" value="Public_Speaking">Public Speaking</div>

                        <div class="checkbox-box"><input type="checkbox" name="interest" value="Data_Science">Data Science</div>

                        <div class="checkbox-box"><input type="checkbox" name="interest" value="Languages">Languages</div>

                        <div class="checkbox-box"><input type="checkbox" name="interest" value="Other">Other</div>
                    </div>
                </div>
                <input type="submit" class="btn" value="Submit" style="margin-top: 40px; margin-left: 60px;">
            </form>    
        </div>
    </div>
    <script>
        const checkboxes = document.querySelectorAll('.checkbox-box');
    
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', function() {
                this.classList.toggle('selected');
            });
        });
    </script>
    
    
    

</body>
</html>
