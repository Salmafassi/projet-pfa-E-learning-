<template>
  <div v-if="toggle">
               
                            <input type="text"  id="name_signup" name="name" placeholder="Entrer le nom complet" v-model="nameComplet" required/>
                         
                        <input type="email" id="mail_signup" v-on:keyup="checkemail" name="email" placeholder="E-mail"
                            v-model="email" required autofocus />
                            <div style="color:red">{{emailEreur}}</div>
                          <input type="text" id="telephone" v-on:keyup="checktelephone" name="telephone" placeholder="Numéro de téléphone" v-model="telephone" required/>
                           <div style="color:red">{{telEreur}}</div>
                           <input type="text" id="spécialité"  name="spécialité" placeholder="Spécialité" v-model="spécialité" required />  
                       
                       <input type="hidden" id="type" name="type" value="AppModelsprof"  />
                        
                        <input type="password" id="password" v-on:keyup="checkpass" name="password" placeholder="Password" v-model="password" required/>
                         <div style="color:red">{{passwordEreur}}</div>
                        <input type="password" id="password_confirmation" v-on:keyup="checkconfirm" name="password_confirmation" v-model="passwordConfi" placeholder="confirmer Password" />
                          <div style="color:red">{{confirmEreur}}</div>
                        
                        <br>
                         
                           <button @click="back()" style="margin-right:5px">Retour</button>
                        <button type="submit" >OK</button>
                       
                        </div>
               
                  <div v-if="!toggle && !signupE" > 
                      <h1 class="title">S'inscrire</h1>
                      <br>
                     <br>
                        <button v-on:click="instructorForm()">Instructeur</button>
                        <br><br>
                        <button v-on:click="EtudiantForm()">Etudiant</button>
                    </div>   
                    <div v-if="signupE">
                          <input type="text" id="name" name="name" placeholder="Entrer le nom complet" value="" required/>
                           <input type="email" id="mail_signup" v-on:keyup="checkemail" name="email" placeholder="E-mail"
                            v-model="email" required autofocus />
                          <div style="color:red">{{emailEreur}}</div>
                          <input type="text" id="telephone" v-on:keyup="checktelephone" name="telephone" placeholder="Numéro de téléphone" v-model="telephone" required/>
                           <div style="color:red">{{telEreur}}</div>

                        <input type="hidden" id="type" name="type" value="AppModelsEtudiant" />
                         
                           <!-- <input type="password" id="pwd2_signup" name="pwd-repeat" placeholder="Niveau" />   -->
                           <select name="niveau" v-model="select" @change="verify()">
                              <option >selectionner</option>
                                <option >INFO</option>
                                        <option >GMSA</option>
                                        <option >SEII</option>
                                          <option >INDUS</option>
                                          <option >GTR</option>
                               <!-- <option value="">INFO1</option>
                               <option value="">INFO2</option>
                               <option value="">INFO3</option> -->

                           </select>
                           <div style="color:red">{{niveauEreur}}</div>
                        <input type="password" id="password" v-on:keyup="checkpass" name="password" placeholder="Password" v-model="password" required/>
                         <div style="color:red">{{passwordEreur}}</div>
                        <input type="password" id="password_confirmation" v-on:keyup="checkconfirm" name="password_confirmation" v-model="passwordConfi" placeholder="confirmer Password" />
                          <div style="color:red">{{confirmEreur}}</div>
                        
                        <br>
                      <button @click="back()" style="margin-right:10px">Retour</button> 
                      
                        <button type="submit">OK</button>
                        </div> 
</template>

<script>
export default {
name:'App',
data:function(){
    return {
        mytext:'hello this is salma',
        toggle:false,
        signupE:false,
        nameComplet:"",
        email:"",
        telephone:"",
        spécialité:"",
        passwordConfi:"",
        password:"",
        nameEreur:"",
        emailEreur:"",
        telEreur:"",
        spécialitéEreur:"",
        passwordEreur:"",
        confirmEreur:"",
        select:"select a field",
        niveauEreur:"",
    }
},
methods: {
    instructorForm() {
        this.toggle=true
       
    },
    EtudiantForm(){
        this.signupE=true
    },
    back(){
        this.toggle=false
         this.signupE=false
    },
    checkemail(){
       var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!this.email || !re.test(this.email))
      {

          this.emailEreur="invalid email syntax";
      } 
      else{
          this.emailEreur="";
      }
    },
    checktelephone(){
       if(this.telephone.length!=10){
          this.telEreur="it has to contain 10 caracter";
      } 
    else{
         this.telEreur="";
    }

    },
    verify(){
 if(this.select=="select a field"){
      this.niveauEreur="the field is required,select one";
       }
       else{
         this.niveauEreur="";  
       }
    },
   checkpass(){
       if(this.select=="select a field"){
      this.niveauEreur="the field is required,select one";
       }
       if(this.select!="select a field"){
         this.niveauEreur="";  
       }
if(this.password.length<8){
          this.passwordEreur="password has to contain more than 8 caracter";
        //    this.niveauEreur=this.select;
      }
      else{
         this.passwordEreur=""; 
      }
   },
    checkconfirm(){
     
     if(this.password!=this.passwordConfi){
          this.confirmEreur="password aren't identical";
      }
      else{
         this.confirmEreur=""; 
      }
      
    }
}
}
</script>

<style>

</style>

