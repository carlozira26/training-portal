import Vue from 'vue';
const eventHub = new Vue();

export default {
    data : function(){
        return {
            cookieKey : 'managercookie',
            apiUrl : 'http://localhost/training-portal/api',
            eventHub: eventHub,
            formRules: {
                required: value => !!value || 'Required.',
                email: value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Invalid e-mail.'
                },
                phoneNumber : value => {
                    const pattern = /^(\+639)\d{9}$/g
                    return pattern.test(value) || 'Should be +639xxxxxxxxx';
                },
            }
        }
    },
    methods : {
        toTitleCase: function(str) {
            return str.replace(
                /\w\S*/g,
                function(txt) {
                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                }
            );
        },

        numberWithCommas: function(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

        truncateText: function(text, length, clamp){
            clamp = clamp || '...';
            var node = document.createElement('div');
            node.innerHTML = text;
            var content = node.textContent;
            return content.length > length ? content.slice(0, length) + clamp : content;
        },
        getBirthAge : function(dateofbirth){
            var birthDate = new Date(dateofbirth);
            var currentDate = new Date();
            var age = 0;
            var month = currentDate.getMonth() >= birthDate.getMonth();
            var date = currentDate.getDate() >= birthDate.getDate();
                
            if(currentDate > birthDate){
                age = currentDate.getYear() - birthDate.getYear() -1;
                if(month){
                    if(date){
                        age = currentDate.getYear() - birthDate.getYear();
                    }
                }
            }else{
                if( !(((currentDate.getYear() - birthDate.getYear()) -1) < 0) ){
                    age = (currentDate.getYear() - birthDate.getYear()) -1;
                }
            }
            if(!Number.isInteger(age)){
                age = 0;
            }
            return age;
        },
        numberOnly : function(x){
            return x.replace(/[^0-9.]/g, '');
        }
    }
};
