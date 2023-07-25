<header>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <?php if (session()->has('user')) : ?>
                <a href="<?php echo url_to('users') ?>" class="navbar-brand">CRUD-AMZ</a>
            <?php endif ?>
            <?php if (!session()->has('user')) : ?>
                <a href="<?php echo url_to('home') ?>" class="navbar-brand">CRUD-AMZ</a>
            <?php endif ?>
            <form class="d-flex" role="search">
                <?php if (session()->has('user')) : ?>
                    <a class="btn btn-secondary" href="<?php echo url_to('users') ?>" role="button"><?php echo session()->get('user')->name; ?></a>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="<?php echo url_to('login.destroy') ?>" role="button">Logout</a>
                <?php endif ?>
                <?php if (!session()->has('user')) : ?>
                    <a class="btn btn-secondary" href="<?php echo url_to('login') ?>" role="button">Login</a>
                <?php endif ?>
            </form>
        </div>
    </nav>
</header>