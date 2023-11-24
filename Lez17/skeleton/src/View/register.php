<?php $this->layout('layout', ['title' => 'Register']) ?>
    <form method="POST" action="<?= $this->e($login_url) ?>">
        <img class="mb-4" src="/img/logo.png" alt="" width="100%">

        <div class="form-floating">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        <label for="username">Username</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y')?> <a href="https://github.com/simplemvc">SimpleMVC</a></p>

    </form>


<?php $this->push('css') ?>
<link href="/css/login.css" rel="stylesheet">
<?php $this->end() ?>
