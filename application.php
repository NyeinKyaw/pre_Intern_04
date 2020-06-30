<!DOCTYPE html>
<html>
    <head>
        <title> University Admission Systm</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <style>
        </style>
    </head>
    <body class="d-flex flex-column">
        <?php
            include 'db.php';
        ?>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-primary navbar-custom fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="img/oxford.png" width="20%"></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul  id="top-menu" class="nav navbar-nav navbar-right ">
                            <li><a href="index.php" class="navbar-text">Home</a></li>
                            <li><a href="application.php" class="navbar-text">Online Application</a></li>
                            <li><a href="login.php" class="navbar-text">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container pt-0">
                <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active" >
                            <img src="img/oxbanner.jpg"  id="imageslider">
                            
                        </div>
                        <div class="carousel-item">
                            <img src="img/oxbanner.jpg" id="imageslider">
                            
                        </div>
                        <div class="carousel-item">
                            <img src="img/oxbanner.jpg" id="imageslider">
                            
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </header>
        <?php
            $valid=true;
            // to validate inputs
            if(!empty($_POST))
            {
                $title=$_POST['title'];
                $enName=$_POST['enName'];
                $mmName=$_POST['mm_Name'];
                $email=$_POST['email'];
                $syllabus=$_POST['syllabus'];
                
                if(empty($title))
                {
                    $titleError='Please choose title';
                    $valid=false;
                }
                        
                if(empty($enName))
                {
                    $enNameError='Please input Your Name (Eng)';
                    $valid=false;
                }

                if(empty($mmName)){
                    $mmNameError='Please input your Name (MM)';
                    $valid=false;
                }

                if(empty($email)){
                    $emailError='Please input your E-mail';
                    $valid=false;
                }
                            
                if(empty($syllabus)){
                    $syllabusError='Please select syllabus';
                    $valid=false;
                }
            }
            //to connect database
            /* if ($valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO applicant(ename,mmname,major) values('$name','$position','$major')";
                $q = $pdo->prepare($sql); 
                $q->execute(array($name,$position,$major));
                Database::disconnect();
                header("Location: application.php");
            }*/
        ?>
        <div class="container maincontent">
            <fieldset class="adminform">
                <legend>Admission Progress</legend>
                <table width="100%">
                    <tr>
                        <td width="20%"><b>1. Fill in Application</b></td>
                        <td width="15%">2. Verify Data</td>
                        <td width="32%">3. Print Application Form</td>
                        <td width="12%">4. Login</td>
                    </tr>
                </table>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </fieldset>
            <form class="form-horizontal" action="application.php" method="post">
            <div class="container">
                <div class="row">
                    <h4> Applicant's Information </h4>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="title">Title</label>
                    <div class="controls col-md-4">
                        <select name="title" id="title" class="form-control form-control-inline col-md-4" >
                            <option value="" >---Select---</option>
                            <option value="Mr">Mr</option>
                            <option value="Ms">Ms</option>
                            <option value="Mrs">Mrs</option>
                        </select>
                        <?php if (!empty($titleError)): ?>
                        <span class="help-inline"><?php echo $titleError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                
                <div class="form-group ">
                    <label class="control-label col-md-2" for="enName">Name (Eng)</label>
                    <div class="controls col-md-4">
                        <input name="enName" type="text" id="enName" class="form-control form-control-inline col-md-4" placeholder="Name in English" >
                        <?php if (!empty($enNameError)): ?>
                        <span class="help-inline"><?php echo $enNameError; ?></span>
                        <?php endif; ?>      
                    </div>
                </div>
                <br>

                <div class="form-group ">
                    <label class="control-label col-md-2" for="mm_Name">Name (MM)</label>
                    <div class="controls col-md-4">
                        <input name="mm_Name" type="text" id="mm_Name" class="form-control form-control-inline col-md-4" placeholder="Name in Myanmar" >
                        <?php if (!empty($mmNameError)): ?>
                        <span class="help-inline"><?php echo $mmNameError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>

                <div class="form-group ">
                    <label class="control-label col-md-2" for="gender">Gender</label>
                    <div class="controls col-md-4">
                        <label class="radio-inline"><input type="radio" name="gender" id="male" value="Male" checked>Male</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="female" value="Female">Female</label>
                    </div>
                </div>
                <br>
            
                <div class="form-group ">
                    <label class="control-label col-md-2" for="email">Email</label>
                    <div class="controls col-md-4">
                        <input name="email" type="text" id="email" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($emailError)): ?>
                        <span class="help-inline"><?php echo $emailError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="control-label col-md-2" for="syllabus">Syllabus</label>
                    <div class="controls col-md-4">
                        <select name="syllabus" id="syllabus" class="form-control form-control-inline col-md-4" >
                            <option value="" >---Select---</option>
                            <option value="civil" >Civil Engineering/option>
                            <option value="it" >IT Engineering</option>
                            <option value="electrical">Electrical Engineering</option>
                        </select>
                        <?php if (!empty($syllabusError)): ?>
                        <span class="help-inline"><?php echo $syllabusError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <br><hr>

            <?php
                $valid=true;
                if(!empty($_POST))
                {
                    $school=$_POST['school'];
                    $level=$_POST['level'];
                    $mark=$_POST['mark'];
                    
                    if(empty($school))
                    {
                        $schoolError='Please input school';
                        $valid=false;
                    }
                            
                    if(empty($level))
                    {
                        $levelError='Please input Your level';
                        $valid=false;
                    }
                
                    if(empty($mark)){
                        $markError='Please input your mark';
                        $valid=false;
                    }
                }
            ?>
            <div class="container" >
                <div class="row">
                <h4>Education </h4>
                </div>
                
                <div class="form-group ">
                    <label class="control-label col-md-2" for="gender">Study in</label>
                    <div class="controls col-md-4">
                        <label class="radio-inline"><input type="radio" name="studyin" id="myanmar" checked>Myanmar</label>
                        <label class="radio-inline"><input type="radio" name="studyin" id="abroad" disabled>Abroad</label>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="school">School</label>
                    <div class="controls col-md-4">
                        <input name="school" type="text" id="school" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($schoolError)): ?>
                        <span class="help-inline"><?php echo $schoolError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="level">Level of Completion</label>
                    <div class="controls col-md-4">
                        <select name="level" id="level" class="form-control form-control-inline col-md-4" >
                            <option value="" >---Select---</option>
                            <option value="gce_o">GCE O Level</option>
                            <option value="gce_a">GCE A Level</option>
                            <option value="grade11">Grade 11</option>
                            <option value="grade11">IGCSE</option>
                        </select>
                        <?php if (!empty($levelError)): ?>
                        <span class="help-inline"><?php echo $levelError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="level">Major of Completion</label>
                    <div class="controls col-md-4">
                        <select name="level" id="level" class="form-control form-control-inline col-md-4" >
                        <option value="" >---Select---</option>
                        <option value="gce_o">Science (Biology)</option>
                        <option value="gce_a">Arts</option>
                        <option value="grade11">Science and Arts</option>
                        <option value="grade11">other</option>
                        </select>
                        <?php if (!empty($levelError)): ?>
                        <span class="help-inline"><?php echo $levelError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="marks">Marks</label>
                    <div class="controls col-md-4">
                        <input name="marks" type="text" id="marks" class="form-control form-control-inline col-md-4"  >
                        <?php if (!empty($markError)): ?>
                        <span class="help-inline"><?php echo $markError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <br><hr>

            <?php
                $valid=true;
                if(!empty($_POST))
                {
                    $birth=$_POST['birthdate'];
                    $nationality=$_POST['nationality'];
                    $citizen=$_POST['citizen'];
                    $religion=$_POST['religion'];
                    $bloodtype=$_POST['bloodtype'];
                    $citizenID=$_POST['citizenid'];
                    $passport=$_POST['passport'];
                    
                    if(empty($birth))
                    {
                        $birthError='Please input your birth date';
                        $valid=false;
                    }
                            
                    if(empty($nationality))
                    {
                        $nationalityError='Please input nationality';
                        $valid=false;
                    }
                
                    if(empty($citizen)){
                        $citizenError='Please input citizen';
                        $valid=false;
                    }

                    if(empty($religion)){
                        $religionError='Please select religion';
                        $valid=false;
                    }
                    if(empty($bloodtype)){
                        $bloodtypeError='Please select blood type';
                        $valid=false;
                    }
                    if(empty($citizenID)){
                        $citizenIDError='Please input your citizen ID';
                        $valid=false;
                    }
                    if(empty($passport)){
                        $passportError='Please input your passport';
                        $valid=false;
                    }
                }
            ?>
            <div class="container" >
                <div class="row">
                <h4>Personal Details </h4>
                </div>
                
                <div class="form-group ">
                    <label class="control-label col-md-2" for="birthdate">Birthdate</label>
                    <div class="controls col-md-4">
                        <input type="date" id="birthdate" name="birthdate">
                        <?php if(!empty($birthError)): ?>
                        <span class="help-inline"><?php echo $birthError; ?></span>     
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="nationality">Nationality</label>
                    <div class="controls col-md-4">
                        <input name="nationality" type="text" id="nationality" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($nationalityError)): ?>
                        <span class="help-inline"><?php echo $nationalityError; ?></span>     
                        <?php endif; ?>
                    </div>
                    <label class="control-label col-md-2" for="citizen">Citizenship</label>
                    <div class="controls col-md-4">
                        <input name="citizen" type="text" id="citizen" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($citizenError)): ?>
                        <span class="help-inline"><?php echo $citizenError; ?></span>     
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="religion">Regligion</label>
                    <div class="controls col-md-4">
                        <select name="religion" id="religion" class="form-control form-control-inline col-md-4" >
                            <option value="" >---Select---</option>
                            <option value="buddhism" >Buddhism</option>
                            <option value="chirstian" >Christian</option>
                            <option value="islam">Islam</option>
                            <option value="hindu">Hindu</option>
                            <option value="other">Other</option>
                        </select>
                        <?php if(!empty($religionError)): ?>
                        <span class="help-inline"><?php echo $religionError; ?></span>     
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="bloodtype">Blood Group</label>
                    <div class="controls col-md-4">
                        <select name="bloodtype" id="bloodtype" class="form-control form-control-inline col-md-4" >
                            <option value="" >---Select---</option>
                            <option value="A" >A</option>
                            <option value="B" >B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                        <?php if(!empty($bloodtypeError)): ?>
                        <span class="help-inline"><?php echo $bloodtypeError; ?></span>     
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="citizenid">Citizen ID</label>
                    <div class="controls col-md-4">
                        <input name="citizenid" type="text" id="citizenid" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($citizenIDError) && !empty($passportError)): ?>
                        <span class="help-inline"><?php echo $citizenIDError; ?></span>     
                        <?php endif; ?>
                    </div>
                    <label class="control-label col-md-2" for="passport">If not Myanmar Citizen,enter passport number</label>
                    <div class="controls col-md-4">
                        <input name="passport" type="text" id="passport" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($citizenIDError) && !empty($passportError)): ?>
                        <span class="help-inline"><?php echo $passportError; ?></span>     
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <br><hr>

            <?php
                $valid=true;
                if(!empty($_POST))
                {
                    $address=$_POST['address'];
                    $street=$_POST['street'];
                    $township=$_POST['township'];
                    $city=$_POST['city'];
                    $zipcode=$_POST['zipcode'];
                    $telephone=$_POST['telephone'];
                    $mobile=$_POST['mobile'];
                    $facebook=$_POST['facebook'];
                    
                    if(empty($address))
                    {
                        $addressError='Please input address no.';
                        $valid=false;
                    }
                            
                    if(empty($street))
                    {
                        $streetError='Please input street';
                        $valid=false;
                    }
                
                    if(empty($township)){
                        $townshipError='Please input township';
                        $valid=false;
                    }

                    if(empty($city)){
                        $cityError='Please select city';
                        $valid=false;
                    }
                    if(empty($zipcode)){
                        $zipcodeError='Please select zipcode';
                        $valid=false;
                    }
                    if(empty($telephone)){
                        $telephoneError='Please input telephone';
                        $valid=flase;
                    }
                    if(empty($mobile)){
                        $mobileError='Please input mobile';
                        $valid=false;
                    }
                    if(empty($facebook)){
                        $facebookError='Please input facebook';
                        $valid=false;
                    }
                }
            ?>
            <div class="container" >
                <div class="row">
                <h4>Mailing Address </h4>
                </div>
                <br>

                <div class="form-group ">
                    <label class="control-label col-md-2" for="address">Address No:</label>
                    <div class="controls col-md-4">
                        <input name="address" type="text" id="address" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($addressError)): ?>
                        <span class="help-inline"><?php echo $addressError; ?></span>     
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="street">Street</label>
                    <div class="controls col-md-4">
                        <input name="street" type="text" id="street" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($streetError)): ?>
                        <span class="help-inline"><?php echo $streetError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="township">Township</label>
                    <div class="controls col-md-4">
                        <input name="township" type="text" id="township" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($townshipError)): ?>
                        <span class="help-inline"><?php echo $townshipError; ?></span>     
                        <?php endif; ?>
                    </div> 
                    <label class="control-label col-md-2" for="city">City</label>
                    <div class="controls col-md-4">
                        <input name="city" type="text" id="city" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($cityError)): ?>
                        <span class="help-inline"><?php echo $cityError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="zipcode">Zip Code</label>
                    <div class="controls col-md-4">
                        <input name="zipcode" type="text" id="zipcode" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($zipcodeError)): ?>
                        <span class="help-inline"><?php echo $zipcodeError; ?></span>     
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="telephone">Telephone</label>
                    <div class="controls col-md-4">
                        <input name="telephone" type="text" id="telephone" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($telephoneError) && !empty($mobileError)): ?>
                        <span class="help-inline"><?php echo $telephoneError; ?></span>     
                        <?php endif; ?>
                    </div> 
                    <label class="control-label col-md-2" for="mobile">Mobile</label>
                    <div class="controls col-md-4">
                        <input name="mobile" type="text" id="mobile" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($telephoneError) && !empty($mobileError)): ?>
                        <span class="help-inline"><?php echo $mobileError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="facebook">Facebook</label>
                        <div class="controls col-md-4">
                        <input name="facebook" type="text" id="facebook" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($facebookError)): ?>
                        <span class="help-inline"><?php echo $facebookError; ?></span>     
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <br><hr>
            <div class="container" >
                <div class="row">
                    <h4>Father's Information </h4>
                </div>
                
                <?php
                    $valid=true;

                    if(!empty($_POST)){
                        $fname=$_POST['fname'];
                        $fnationality=$_POST['fnationality'];
                        $fcitizen=$_POST['fcitizen'];

                        if(empty($fname)){
                            $fnameError='Please input Name';
                            $valid=false;
                        }
                        if(empty($fnationality)){
                            $fnationalityError='Please input nationality';
                            $valid=false;
                        }
                        if(empty($fcitizen)){
                            $fcitizenError='Please input citizenship';
                            $valid=false;
                        }

                        #living or decrease check
                        if(!empty($_POST['fliving'])){

                            $faddress=$_POST['faddress'];
                            $fstreet=$_POST['fstreet'];
                            $ftownship=$_POST['ftownship'];
                            $fcity=$_POST['fcity'];
                            $fzipcode=$_POST['fzipcode'];
                            $ftelephone=$_POST['ftelephone'];
                            $fmobile=$_POST['fmobile'];
                            
                            if(empty($faddress))
                            {
                                $faddressError='Please input address no.';
                                $valid=false;
                            }
                                    
                            if(empty($fstreet))
                            {
                                $fstreetError='Please input street';
                                $valid=false;
                            }
                        
                            if(empty($ftownship)){
                                $ftownshipError='Please input township';
                                $valid=false;
                            }

                            if(empty($fcity)){
                                $fcityError='Please select city';
                                $valid=false;
                            }
                            if(empty($fzipcode)){
                                $fzipcodeError='Please select zipcode';
                                $valid=false;
                            }

                            if(empty($ftelephone)){
                                $ftelephoneError='Please input telephone';
                                $valid=flase;
                            }

                            if(empty($fmobile)){
                                $fmobileError='Please input mobile';
                                $valid=false;
                            }
                        }
                    }
                ?>
                
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="fname">Name</label>
                    <div class="controls col-md-4">
                    <input name="fname" type="text" id="fname" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($fnameError)): ?>
                        <span class="help-inline"><?php echo $fnameError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="fnationality">Nationality</label>
                    <div class="controls col-md-4">
                        <input name="fnationality" type="text" id="fnationality" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($fnationalityError)): ?>
                        <span class="help-inline"><?php echo $fnationalityError; ?></span>
                        <?php endif; ?>
                    </div>
                    <label class="control-label col-md-2" for="fcitizen">Citizenship</label>
                    <div class="controls col-md-4">
                        <input name="fcitizen" type="text" id="fcitizen" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($fcitizenError)): ?>
                        <span class="help-inline"><?php echo $fcitizenError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="fstatus">Status</label>
                    <div class="controls col-md-4">
                        <label class="radio-inline"><input type="radio" name="fstatus" id="fliving" checked>Living</label>
                        <label class="radio-inline"><input type="radio" name="fstatus" id="fdecease">Decese</label>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="fage">Age</label>
                    <div class="controls col-md-4">
                        <input name="fage" type="text" id="fage" class="form-control form-control-inline col-md-4"  >
                    </div>  
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="foccupation">Occuputation</label>
                    <div class="controls col-md-4">
                        <input name="foccupation" type="text" id="foccupation" class="form-control form-control-inline col-md-4"  >
                    </div>  
                        <label class="control-label col-md-2" for="fposition">Position</label>
                    <div class="controls col-md-4">
                        <input name="fposition" type="text" id="fposition" class="form-control form-control-inline col-md-4"  >
                    </div> 
                </div>
                <br><br>
                <div class="form-check">
                    <label class="control-label col-md-2" for="faddress">Father's address</label>
                    <div class="controls col-md-4">
                        <input name="faddress" type="checkbox" id="faddress" class="form-check-input form-control-inline col-md-1">
                        <label class="form-check-label" for="faddress">Same as applicant's address</label>           
                        <?php if(!empty($faddressError)): ?>
                        <span class="help-inline"><?php echo $faddressError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br><br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="street">Street</label>
                    <div class="controls col-md-4">
                        <input name="street" type="text" id="fstreet" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($fstreetError)): ?>
                        <span class="help-inline"><?php echo $fstreetError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="township">Township</label>
                    <div class="controls col-md-4">
                        <input name="township" type="text" id="ftownship" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($ftownshipError)): ?>
                        <span class="help-inline"><?php echo $ftownshipError; ?></span>     
                        <?php endif; ?>
                    </div> 
                    <label class="control-label col-md-2" for="city">City</label>
                    <div class="controls col-md-4">
                        <input name="city" type="text" id="fcity" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($fcityError)): ?>
                        <span class="help-inline"><?php echo $fcityError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="fzipcode">Zip Code</label>
                        <div class="controls col-md-4">
                        <input name="fzipcode" type="text" id="fzipcode" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($fzipcodeError)): ?>
                        <span class="help-inline"><?php echo $fzipcodeError; ?></span>     
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="township">Telephone</label>
                    <div class="controls col-md-4">
                        <input name="telephone" type="text" id="ftelephone" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($ftelephoneError) && !empty($fmobileError)): ?>
                        <span class="help-inline"><?php echo $ftelephoneError; ?></span>     
                        <?php endif; ?>
                    </div> 
                    <label class="control-label col-md-2" for="mobile">Mobile</label>
                    <div class="controls col-md-4">
                        <input name="mobile" type="text" id="fmobile" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($ftelephoneError) && !empty($fmobileError)): ?>
                        <span class="help-inline"><?php echo $fmobileError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br>
                
            </div>
            <br><hr>
            <div class="container" >
                <div class="row">
                    <h4>Mother's Information </h4>
                </div>
                
                <?php
                    $valid=true;

                    if(!empty($_POST)){
                        $mname=$_POST['mname'];
                        $mnationality=$_POST['mnationality'];
                        $mcitizen=$_POST['mcitizen'];

                        if(empty($mname)){
                            $mnameError='Please input Name';
                            $valid=false;
                        }
                        if(empty($mnationality)){
                            $mnationalityError='Please input nationality';
                            $valid=false;
                        }
                        if(empty($mcitizen)){
                            $mcitizenError='Please input citizenship';
                            $valid=false;
                        }

                        #living or decrease check

                        $mliving=$_POST['mliving'];
                        if(!empty($mliving)){

                            $maddress=$_POST['maddress'];
                            $mstreet=$_POST['mstreet'];
                            $mtownship=$_POST['mtownship'];
                            $mcity=$_POST['mcity'];
                            $mzipcode=$_POST['mzipcode'];
                            $mtelephone=$_POST['mtelephone'];
                            $mmobile=$_POST['mmobile'];
                            
                            if(empty($maddress))
                            {
                                $maddressError='Please input address no.';
                                $valid=false;
                            }
                                    
                            if(empty($mstreet))
                            {
                                $mstreetError='Please input street';
                                $valid=false;
                            }
                        
                            if(empty($mtownship)){
                                $mtownshipError='Please input township';
                                $valid=false;
                            }

                            if(empty($mcity)){
                                $mcityError='Please select city';
                                $valid=false;
                            }
                            if(empty($mzipcode)){
                                $mzipcodeError='Please select zipcode';
                                $valid=false;
                            }

                            if(empty($mtelephone)){
                                $mtelephoneError='Please input telephone';
                                $valid=flase;
                            }

                            if(empty($mmobile)){
                                $mmobileError='Please input mobile';
                                $valid=false;
                            }
                        }
                    }
                ?>
                
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="mname">Name</label>
                    <div class="controls col-md-4">
                    <input name="mname" type="text" id="mname" class="form-control form-control-inline col-md-4"  >
                    <?php if(!empty($mnameError)): ?>
                        <span class="help-inline"><?php echo $mnameError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="mnationality">Nationality</label>
                    <div class="controls col-md-4">
                        <input name="mnationality" type="text" id="mnationality" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($mnationalityError)): ?>
                        <span class="help-inline"><?php echo $mnationalityError; ?></span>
                        <?php endif; ?>
                    </div>
                    <label class="control-label col-md-2" for="mcitizen">Citizenship</label>
                    <div class="controls col-md-4">
                        <input name="mcitizen" type="text" id="mcitizen" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($mcitizenError)): ?>
                        <span class="help-inline"><?php echo $mcitizenError; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="status">Status</label>
                    <div class="controls col-md-4">
                        <label class="radio-inline"><input type="radio" name="mstatus" id="mliving" checked>Living</label>
                        <label class="radio-inline"><input type="radio" name="mstatus" id="mdecese">Decese</label>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="mage">Age</label>
                    <div class="controls col-md-4">
                        <input name="mage" type="text" id="mage" class="form-control form-control-inline col-md-4"  >
                    </div>  
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="moccupation">Occuputation</label>
                    <div class="controls col-md-4">
                        <input name="moccupation" type="text" id="moccupation" class="form-control form-control-inline col-md-4"  >
                    </div>  
                        <label class="control-label col-md-2" for="mposition">Position</label>
                    <div class="controls col-md-4">
                        <input name="mposition" type="text" id="mposition" class="form-control form-control-inline col-md-4"  >
                    </div> 
                </div>
                <br><br>
                <div class="form-check">
                    <label class="control-label col-md-2" for="maddress">Mother's address</label>
                    <div class="controls col-md-4">
                        <input name="maddress" type="checkbox" id="maddress" class="form-check-input form-control-inline col-md-1"  >
                        <label class="form-check-label" for="maddress">Same as applicant's address</label>    
                        <?php if(!empty($maddressError)): ?>
                        <span class="help-inline"><?php echo $maddressError; ?></span>     
                        <?php endif; ?>       
                    </div>  
                </div>
                <br><br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="mstreet">Street</label>
                    <div class="controls col-md-4">
                        <input name="mstreet" type="text" id="mstreet" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($mstreetError)): ?>
                        <span class="help-inline"><?php echo $mstreetError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="mtownship">Township</label>
                    <div class="controls col-md-4">
                        <input name="mtownship" type="text" id="mtownship" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($mtownshipError)): ?>
                        <span class="help-inline"><?php echo $mtownshipError; ?></span>     
                        <?php endif; ?>
                    </div> 
                    <label class="control-label col-md-2" for="mcity">City</label>
                    <div class="controls col-md-4">
                        <input name="mcity" type="text" id="mcity" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($mcityError)): ?>
                        <span class="help-inline"><?php echo $mcityError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br>
                <div class="form-group ">
                    <label class="control-label col-md-2" for="mzipcode">Zip Code</label>
                    <div class="controls col-md-4">
                        <input name="mzipcode" type="text" id="mzipcode" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($mzipcodeError)): ?>
                        <span class="help-inline"><?php echo $mzipcodeError; ?></span>     
                        <?php endif; ?>
                    </div>
                        
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="mtelephone">Telephone</label>
                    <div class="controls col-md-4">
                        <input name="mtelephone" type="text" id="mtelephone" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($mtelephoneError) && !empty($mmobileError)): ?>
                        <span class="help-inline"><?php echo $mtelephoneError; ?></span>     
                        <?php endif; ?>
                        </div> 
                        <label class="control-label col-md-2" for="mmobile">Mobile</label>
                    <div class="controls col-md-4">
                        <input name="mmobile" type="text" id="mmobile" class="form-control form-control-inline col-md-4"  >
                        <?php if(!empty($mtelephoneError) && !empty($mmobileError)): ?>
                        <span class="help-inline"><?php echo $mmobileError; ?></span>     
                        <?php endif; ?>
                    </div>  
                </div>
                <br>
                <div class="form-group">
                    <label class="control-label col-md-2" for="Status">Guardian is:</label>
                    <div class="control col-md-2">
                        <label class="radio-inline" for="Father"><input type="radio" name="Father" id="Father" value="Father" checked>Father</label>
                    </div>
                    <div class="control col-md-2">
                        <label class="radio-inline" for="Mother"><input type="radio" name="Mother" id="Mother" value="Mother">Mother</label>
                    </div>
                    <div class="control col-md-2">
                        <label class="radio-inline" for="Other"><input type="radio" name="Other" id="Other" value="Other">Other</label>
                    </div>
                </div>
                
            </div>
            <br><hr>

            <div class="col-md-12 button">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        
        </div><br>

        <footer>
            Copyright&#169; All Rights Reserved By Oxford University
        </footer>
    </body>
</html>