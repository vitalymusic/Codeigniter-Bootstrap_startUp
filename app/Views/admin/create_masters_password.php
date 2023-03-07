<?php include("header.php")?>
    <h1 class="text-center m-3"><?=$subtitle?></h1>
<div class="container">


<div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                    <label for="password" class="form-label">Parole</label>
                    <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                    <label for="password" class="form-label">Parole atkārtot</label>
                    <input type="password" class="form-control" id="password_repeat" name="password_repe">
            </div>
        </div>
        </div>
    </div>
    <?php include("footer.php")?>