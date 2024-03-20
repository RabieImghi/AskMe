<template>
    <select v-bind:name="name" v-bind:id="id" v-bind:multiple="multiple">
      <slot></slot>
    </select>
  </template>
  
<script>
import $ from 'jquery';
import 'select2';
import 'select2/dist/css/select2.css';
import 'select2-bootstrap-theme/dist/select2-bootstrap.css';

export default {
props: ['options', 'value', 'name', 'id', 'multiple'],
mounted: function () {
    const vm = this;
    $(this.$el)
    .select2({ data: this.options })
    .val(this.value)
    .trigger('change')
    .on('change', function () {
        vm.$emit('input', $(this).val());
    });
},
watch: {
    value: function (value) {
    $(this.$el)
        .val(value)
        .trigger('change');
    },
    options: function (options) {
    $(this.$el).empty().select2({ data: options });
    },
},
unmounted: function () {
    $(this.$el).off().select2('destroy');
},
};
</script>