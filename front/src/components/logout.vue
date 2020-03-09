<template>
	<v-container fluid fill-height justify-center>
		<v-progress-circular :size="70" :width="7" color="blue darken-4" indeterminate></v-progress-circular>
	</v-container>
</template>

<script>

import VueCookies from 'vue-cookies';
	
export default {

	mounted : function(){
		VueCookies.remove(this.cookieKey);

		setTimeout(() => {
            this.$router.push('/login');
        }, 500);
	}

};


</script>