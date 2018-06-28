<template lang="html">

  <div class="server-control flex-row d-flex ml-auto text-white">
    <p class="d-inline-block mb-0">Reload server faces: </p><span class="hover pointer ml-2" @click="reloadFaces"><i class="fa fa-2x fa-refresh"  v-bind:class="{ rotating: reloadServer }"></i></span>
  </div>

</template>

<script>
export default {
  data() {
      return {
          reloadServer: false,
      };
  },
  methods: {
      reloadFaces() {
        var self = this
        this.reloadServer = true;

        axios.get('https://faces-admin.wecode.dk:5000/reload')
        .then(function (response) {
          self.reloadServer = false;
          toastr.success('Faces reloaded on DL server')
        })
        .catch(function (error) {
          toastr.error(error);
          console.log(error);
        });

      },


  },

}
</script>

<style lang="css">

  .server-control{
    display: inline-block;
    float: right;
  }

  .spinner.active{

  }
</style>
