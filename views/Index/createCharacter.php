
<div class="text-center grid-center card" style="width: 28%;">
    <form class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Creating a new character</h1>
    <label class="sr-only">Name</label>
    <input class="form-control" placeholder="Character's name" required autofocus>
    <label class="sr-only">Class</label>
    <div class="dropdown mt-3">
        <button class="btn btn-default dropdown-toggle" type="button" id="menu" data-toggle="dropdown">Classes
        <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <li role="presentation" onclick="select(1)"><a role="menuitem" tabindex="-1">Mage</a></li>
            <li role="presentation" onclick="select(2)"><a role="menuitem" tabindex="-1">Rogue</a></li>
            <li role="presentation" onclick="select(3)"><a role="menuitem" tabindex="-1">Warrior</a></li>
        </ul>
    </div>
    <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Create</button>
    <a href="<?php echo URL ?>characters" class="asyncLink">Cancel</a>
</form>
</div>

<script>
    function select(int){
        switch (int) {
            case 1:
                $("#menu").html("Mage");
            break;
            case 2:
                $("#menu").html("Rogue");
            break;
            case 3:
                $("#menu").html("Warrior");
            break;
        
            default:
                break;
        }
    }
</script>