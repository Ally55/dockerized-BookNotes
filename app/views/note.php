<div class="container-fluid background-div">
    <?php include(__DIR__ . '/header.php'); ?>

    <div class="row no-gutters note-container">
        <div class="row no-gutters bg-light info-card">
            <?php $noteId = (int)$_GET['id'];
            $query = \BookNotes\Core\Container::get('query');
                $note = $query->getDataNoteById($noteId); ?>

            <div class="col d-flex justify-content-end cover-container ml-3 ml-lg-0">
                <img src="<?php echo htmlspecialchars($note['cover_link'], ENT_QUOTES); ?>" class="cover-link">
            </div>

            <div class="col d-flex justify-content-start ml-3 flex-column tagline-container">
                <h1 class="note-title text-center text-md-left mt-5 mt-md-0"> <?php echo htmlspecialchars($note['title'], ENT_QUOTES); ?> </h1>

                <span class="note-info mt-5 mt-md-0"><?php echo htmlspecialchars($note['author'], ENT_QUOTES); ?> </span>
                <span class="note-info"><?php echo htmlspecialchars($note['rate'], ENT_QUOTES); ?> /10</span>
            </div>

            <div class="intro-container mt-5 p-3">
                <h1 class="intro-title">Note's intro</h1>
                <p class="intro-note"><?php echo htmlspecialchars($note['intro'], ENT_QUOTES); ?> </p>
            </div>

            <div class="body-container mt-5 p-3">
                <h1 class="body-title">Note's body</h1>
                <p class="body-note mb-5"><?php echo nl2br(htmlspecialchars($note['body'], ENT_QUOTES)); ?> </p>
                <small class>Created at <?php echo htmlspecialchars($note['created_at'], ENT_QUOTES); ?></small>
            </div>
        </div>
    </div>
</div>
