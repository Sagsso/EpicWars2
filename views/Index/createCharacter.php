<?php
require_once DATABASE."createCharacter.php";

?>
<div class="text-center grid-center card" style="width: 28%;">
    <form action="#" class="form-signin" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Creating a new character</h1>
        <label class="sr-only">Name</label>
        <input class="form-control" placeholder="Character's name" name="name" required autofocus>
        <label class="sr-only">Class</label>
        <div class="dropdown mt-3">
            <select name="class" id="">
                <option value="Mage">Mage</option>
                <option value="Rogue">Rogue</option>
                <option value="Warrior">Warrior</option>
            </select>
        </div>
        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Create</button>
        <a href="<?php echo URL ?>characters" class="asyncLink">Cancel</a>
    </form>
</div>
