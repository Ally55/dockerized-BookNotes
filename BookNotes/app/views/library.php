<div class="container-fluid background-div">

    <?php include(__DIR__ . "/header.php"); ?>

    <h1 class="text-center mt-5 mb-2 mb-md-4 library-tagline">All the notes from our users about the best books known!</h1>
    <div class="row no-gutters text-center mt-2 mt-lg-5 book-container mx-auto d-flex justify-content-between align-items-center">
    <?php $query = \BookNotes\Core\Container::get('query');
    foreach($query->getDataNotesFromDB() as $note) { ?>

        <div class="col card mb-5 card-notes bg-light">
            <div class="row no-gutters ">
                <div class="col-md-3 img-container">
                    <img src="<?php echo htmlspecialchars($note['cover_link'], ENT_QUOTES); ?> " class="card-img d-inline-block">
                </div>
                <div class="col-md-9">
                    <div class="card-body bg-light" >
                        <a href="/note?id=<?php echo htmlspecialchars($note['id'], ENT_QUOTES); ?>" class="card-title-tag" <h2 class="card-title mb-1"> <?php echo htmlspecialchars($note['title'], ENT_QUOTES); ?> </h2></a>
                        <div class="d-flex align-items-center justify-content-around text-center mb-4">
                            <span class="text-muted note-author"><?php echo htmlspecialchars($note['author'], ENT_QUOTES); ?></span>
                            <span class="text-muted note-rate">Rate: <?php echo htmlspecialchars($note['rate'], ENT_QUOTES); ?>/10</span>
                        </div>
                        <div>
                            <p class="card-text text-left note-intro"> <?php echo htmlspecialchars($note['intro'], ENT_QUOTES); ?> </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    </div>

</div>


