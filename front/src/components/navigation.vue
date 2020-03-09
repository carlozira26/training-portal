<template>
	<div>
		<template>
			<v-toolbar color="primary darken-4" dark app fixed>
				<v-spacer></v-spacer>
				<v-btn depressed class="primary darken-4" tile :to="'/logout'">
					Log Out
				</v-btn>
			</v-toolbar>
		</template>
		<v-content class="pa-4">
			<router-view></router-view>
		</v-content>
		<v-snackbar v-model="sbar" :color="snackBarColor" right top>
			<v-icon class="white--text" left>{{ icon }}</v-icon>
			{{ message }}
			<v-btn text icon @click.native="sbar = false"> &times; </v-btn>
		</v-snackbar>
	</div>
</template>
<script>
import VueCookies from 'vue-cookies';
import axios from "axios";

export default {
	created : function(){
		this.user = VueCookies.get(this.cookieKey).data;
		this.name = this.user.fullname;
		this.eventHub.$on('showSnackBar', val =>{
			this.icon = val.icon;
			this.snackBarColor = val.color;
			this.message = val.message;
			this.sbar = true;
		});
	},

	data : () => ({
		connect : '',
		appnav : false,
		globalLoading : false,
		name : '',
		snackBarColor: '',
		sbar: '',
		message: '',
		icon: ''
	}),

	methods : {
		
	}
};	
</script>