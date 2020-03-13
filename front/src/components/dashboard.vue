<template>
	<v-card>
		<v-card-title class="display-1 primary darken-4 white--text">
			JFC Training Portal
		</v-card-title>
		<v-card-text>
			<report-component></report-component>
		</v-card-text>
	</v-card>
</template>
<script>
import form from './templates/form.vue';
import report from './templates/tracking-report.vue';
import VueCookies from 'vue-cookies';
import axios from "axios";
	export default {
		components:{
			'report-component' : report,
		},
		created: function(){
			if(VueCookies.get(this.cookieKey) == null){
				this.$router.push('/login');
			}
			this.userid = VueCookies.get(this.cookieKey).data.id;
		},
		data : function(){
			return {
				
			}
		},
		methods : {
			
		}
	};
</script>