<header class="header lg:flex justify-between p-4 lg:px-8 mb-8 lg:mb-12">
    <x-logo />

    @if (has_nav_menu('primary_navigation'))
        <x-navigation name="primary_navigation" class="nav" />
    @endif
</header>
