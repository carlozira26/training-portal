<template>
	<v-card>
		<v-card-title class="display-1 primary darken-4 white--text">
			JFC Training Portal
		</v-card-title>
		<v-card-text>
			<v-tabs vertical>
				<v-tab>
					FORMS
				</v-tab>
				<v-tab>
					TABS
				</v-tab>
				<v-tab>
					REPORTS
				</v-tab>
				<v-tab-item>
					<form-component></form-component>
				</v-tab-item>
				<v-tab-item>
					<newhires-component></newhires-component>
				</v-tab-item>
				<v-tab-item>
					<report-component></report-component>
				</v-tab-item>
			</v-tabs>
		</v-card-text>
	</v-card>
</template>
<script>
import form from './templates/form.vue';
import newHires from './templates/new-hires.vue';
import report from './templates/tracking-report.vue';
import VueCookies from 'vue-cookies';
import axios from "axios";
	export default {
		components:{
			'form-component' : form,
			'newhires-component' : newHires,
			'report-component' : report,
		},
		created: function(){
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