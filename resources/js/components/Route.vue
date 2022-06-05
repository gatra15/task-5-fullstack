<template>
    <div>
        <router-view />
    </div>
</template>

<script>
import HeaderComponent from './HeaderComponent.vue';
import FooterComponent from './FooterComponent.vue';

export default {
    name: 'route',
    components: {
        HeaderComponent,
        FooterComponent,
    }
}
</script>

<style>

</style>