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
		this.role = VueCookies.get(this.cookieKey).data.role;
		this.user = VueCookies.get(this.cookieKey).data;
		this.name = this.user.fullname;
		this.fetchRoles();

		this.eventHub.$on('showSnackBar', val =>{
			this.icon = val.icon;
			this.snackBarColor = val.color;
			this.message = val.message;
			this.sbar = true;
		});
	},
	components : {

	},
	computed: {
		passwordConfirmationRule() {
			return () => (this.form.newpass === this.form.confirmpass) || 'Password must match'
		},
	},
	data : () => ({
		connect : '',
		appnav : false,
		globalLoading : false,
		name : '',
		snackBarColor: '',
		sbar: '',
		message: '',
		icon: '',
		roleList : [],
		changePassword : false,
		errorPass : false,
		errmessage : '',

		form : {
			oldpass: '',
			newpass: '',
			confirmpass: ''
		},
	}),

	methods : {
		fetchRoles : function(){
			let _this = this;
			axios.create({
				headers : {
					'Authorization' : `Bearer ${this.token}`
				}
			})
			.get(this.apiUrl + '/roles/list')
			.then(function(res){
				for(let role in res.data.data){
					_this.roleList.push({
						text : res.data.data[role].role,
						value: res.data.data[role].id
					});
				}
			})
		},
		checkRoles : function(id){
			let ret = "";
			for(let i in this.roleList){
				if(this.roleList[i].value == id){
					ret = this.roleList[i].text;
				}
			}
			return ret.toUpperCase();
		},
		changePassModal : function(){
			if(this.$refs.vForm){
				this.$refs.vForm.reset();
			}
			this.changePassword = true;
		},
		submitPassword : function(){
			let _this = this,
			formData = new FormData();
			_this.errorPass = false;
			if(this.$refs.vForm.validate()){
				formData.append('userid', _this.user.id);
				formData.append('oldpass', _this.form.oldpass);
				formData.append('newpass', _this.form.newpass);
				axios.create({
					headers : {
						'Authorization' : `Bearer ${this.token}`
					}
				})
				.post(this.apiUrl + '/users/changepass',formData)
				.then(function(res){
					if(res.data.status){
						_this.eventHub.$emit('showSnackBar',{icon:'check',color:'success',message:res.data.message});
						_this.changePassword = false;
					}else{
						_this.errmessage = res.data.message;
					}
				});
			}
		}
	}
};	
</script>