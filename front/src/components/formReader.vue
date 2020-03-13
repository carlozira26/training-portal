<template>
	<v-container>
		<v-card>
			<v-card-title class="display-1 primary darken-4 white--text">
				JFC Training Portal
			</v-card-title>
			<v-card-text>
				<form-component></form-component>
			</v-card-text>
		</v-card>
	</v-container>
</template>
<script>
import formComponent from './templates/form.vue';
	export default {
		components:{
			'form-component' : formComponent,
		},
	};
</script>