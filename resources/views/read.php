<div id="main_article" class="uk-container">
    <article class="uk-margin uk-article">
        <h1 class="uk-article-title"><?=$post->title?></h1>
        <div class="uk-text-meta">
            by <?php print $post->getUsername() ?>
        </div>
        <div class="uk-text-meta">
            <?=$post->getCreatedAt()?>
            <?php if($post->isOwner()){ ?>
                <span>
                    <a href="/post/<?=$post->id?>/edit" class="uk-link-text" id="update">update</a>
                    <a href="#" class="uk-link-text" id="delete">delete</a>
                </span>
            <?php } ?>
        </div>
        <div class="uk-text-lead uk-margin-bottom"><?=$post->content?></div>
    </article>
</div>

<script>
    const $delete = document.getElementById('delete');
    $delete.addEventListener('click', () => {
        fetch('/posts/'+'<?=$post->id?>', {
            method: 'delete',
            body: JSON.stringify({_csrfToken: "<?=$_SESSION['CSRF_TOKEN']?>"})
        }).then(() => {
                window.location = '/';
            })
    });
</script>