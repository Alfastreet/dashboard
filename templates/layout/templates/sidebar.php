<aside class="sidebar">
    <div class="logoAlfa">
        <?= $this->Html->image('Alfa-logo.webp', ['alt' => 'Logo Alfastreet', 'url' => '/']) ?>
    </div>
    <h2>Aqui va el nombre de usuario</h2>

    <nav class="sidebar-nav">
        <?= $this->Html->link('Casinos', ['controller' => 'casinos', 'action' => 'index']) ?>
        <?= $this->Html->link('Clientes', ['controller' => 'client', 'action' => 'index']) ?>
        <?= $this->Html->link('Compañias', ['controller' => 'company', 'action' => 'index']) ?>
        <?= $this->Html->link('Cotizaciones', ['controller' => 'quotes', 'action' => 'index']) ?>
        <?= $this->Html->link('Dueños', ['controller' => 'owner', 'action' => 'index']) ?>
        <?= $this->Html->link('Empresas', ['controller' => 'business', 'action' => 'index']) ?>
        <?= $this->Html->link('Maquinas', ['controller' => 'machines', 'action' => 'index']) ?>
        <?= $this->Html->link('Contadores', ['controller' => 'accountants', 'action' => 'index']) ?>
        <?= $this->Html->link('Partes o Repuestos', ['controller' => 'parts', 'action' => 'index']) ?>
        <?= $this->Html->link('Usuarios', ['controller' => 'users', 'action' => 'index']) ?>
    </nav>
</aside>