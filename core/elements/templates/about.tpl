{extends 'file:templates/layout.tpl'}

{block 'main'}
  <div class="content-wrapper container">
    <main class="main-content main-content--text">
      {include 'file:chunks/breadcrumbs.tpl'}

      <h1>{$_modx->resource.pagetitle}</h1>

      {$_modx->resource.content}

      <h2>С нами уже успешно сотрудничают</h2>
      {include 'file:chunks/ourClients.tpl'}
    </main>

    {include 'file:chunks/sidebar.tpl'}
  </div>
{/block}