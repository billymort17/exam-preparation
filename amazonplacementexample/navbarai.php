<!-- div for the nav bar -->
<div class="nav">
    <!-- add logo as a redirect button to amazon -->
    <a href="https://www.amazon.co.uk"><img src="Resources/AmazonLogo.png" alt="Amazon Logo" id="logo"></a>
    <div>
        <a href="index.php"><button>Homepage</button></a>
        <a href="private.php"><button>Secret</button></a>
        <a href="newsletter.php"><button>Newsletter</button></a>
        <?php
        if (!isset($_SESSION["userid"]) or !$_SESSION["userid"]) {
            echo '<a href="login.php"><button>Login</button></a>';
        } else {
            echo '<a href="logout.php"><button>Logout</button></a>';
        }
        ?>
    </div>
</div>

<!-- chat box -->
<div class="chatbox">
    <!-- chat bot title -->
    <div class="chattop">
        <img id="pfp" alt="AI Profile Picture" src="https://static.vecteezy.com/system/resources/thumbnails/002/534/006/small/social-media-chatting-online-blank-profile-picture-head-and-body-icon-people-standing-icon-grey-background-free-vector.jpg">
        <p id="name">AI</p>
        <p id="dash">-</p>
        <p id="desc">Amazon Chat Bot</p>
    </div>
    <!-- chat -->
    <div class="chat">
        <input id="chatbox" type="text" placeholder="Type Here...">
        <label for="chatbox">Chat Box</label><br>
    </div>

    <script src="script.js"></script>

</div>
