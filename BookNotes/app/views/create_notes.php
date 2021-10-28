<?php

//if (!isAuthenticated()) {
//    header('Location:/library');
//    exit;
//}
?>

<div class="container-fluid background-div">

    <?php include(__DIR__ . "/header.php"); ?>

    <div class="row text-center no-gutters mt-4 mt-md-5">
        <div class="col">
            <h1 class="create-tagline">Create new notes for your books!</h1>
        </div>
    </div>

    <?php if(!empty($errors)) { ?>
        <div class="row d-flex align-items-center justify-content-center no-gutters">
            <div class="col alert alert-danger mt-3 error-message p-1" role="alert">
                <ul class="error-list">
                    <?php foreach($errors as $error) { ?>
                        <li> <?php echo htmlspecialchars($error, ENT_QUOTES);?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>

    <div class="row no-gutters mt-3 mt-md-5">
        <div class="col-10 col-md-7 col-lg-5 col-xl-4 mx-auto">
            <form method="post">
                <div class="form-group">
                    <label for="title" class="label-form">Title</label>
                    <input type="text" name="title" class="form-control input-form" id="title" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label for="author" class="label-form">Author</label>
                    <input type="text" name="author" class="form-control input-form" id="author">
                </div>

                <div class="form-group">
                    <label for="rate" class="label-form">Rate</label>
                    <input type="range" list="tickmarks" min="1" max="10" name="rate" class="form-control input-form" id="rate">
                    <datalist id="tickmarks">
                    <option value="1" label="0%">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4"></option>
                    <option value="5" label="50%"></option>
                    <option value="6"></option>
                    <option value="7"></option>
                    <option value="8"></option>
                    <option value="9"></option>
                    <option value="10" label="100%"></option>
                    </datalist>
                </div>

                <div class="form-group">
                    <label for="cover_link" class="label-form">Cover Link</label>
                    <input type="text" name="cover_link" class="form-control input-form" id="cover_link">
                </div>

                <div class="form-group">
                    <label for="intro" class="label-form">Note's Intro</label>
                    <textarea name="intro" rows="4" class="form-control input-form" id="intro"></textarea>
                </div>

                <div class="form-group">
                    <label for="body" class="label-form">Note's Body</label>
                    <textarea name="body" rows="10" class="form-control input-form" id="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary signup-button mt-1 mb-3 ">CREATE NEW NOTE</button>

            </form>
        </div>
    </div>

</div>
