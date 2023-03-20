<template>
  <div class="pt-4">
    <h5
      class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50"
    >Generate your desire password.</h5>
    <div v-if="password" class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
      <h3 class="font-bold p-5 bg-green-100">Your Password: {{ password }}</h3>
    </div>

    <div class>
      <label
        class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2"
      >Password type</label>
      <div class="flex">
        <div class="flex items-center mr-4">
          <input
            id="inline-radio"
            v-model="passwordType"
            type="radio"
            :value="1"
            name="inline-radio-group"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
          />
          <label
            for="inline-radio"
            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
          >Password</label>
        </div>
        <!-- <div class="flex items-center mr-4">
          <input
            id="inline-2-radio"
            v-model="passwordType"
            type="radio"
            :value="2"
            name="inline-radio-group"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
          />
          <label
            for="inline-2-radio"
            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
          >Passphrase</label>
        </div> -->
      </div>

      <div class="pt-4">
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-2/6 px-3 mb-6 md:mb-0">
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              for="grid-first-name"
            >Password Length</label>
            <input
              class="appearance-none block w-full text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              type="number"
              v-model="passwordLength"
              min="6"
              max="128"
              step="1"
            />
          </div>
          <div class="w-full md:w-2/6 px-3">
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              for="grid-last-name"
            >Minimum Numbers</label>
            <input
              class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name"
              type="number"
              v-model="minNumbers"
              min="1"
              max="passwordLength"
            />
          </div>
          <div class="w-full md:w-2/6 px-3">
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              for="grid-last-name"
            >Minimum Special Char</label>
            <input
              class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-last-name"
              type="number"
              v-model="minSpecialChars"
              min="1"
              max="passwordLength"
            />
          </div>

          <div class="px-3 w-full">
            <div v-for="(type,index) in characters" :key="index">
              <label>
                <input
                  type="checkbox"
                  v-bind:checked="type.checked"
                  v-on:click="type.checked = !type.checked"
                />
                {{type.name}}
              </label>
              <br />
            </div>
          </div>

          <div class="px-3 pt-4">
            <button
              class="inline-block px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline cursor-pointer"
              @click="generatePassword"
            >Regenerate password</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      passwordType: 1,
      passwordLength: 12,
      minNumbers: 2,
      minSpecialChars: 1,
      password: null,
      characters: [
        {
          name: "Lowercase",
          value: "abcdefghijklmnopqrstuvwxyz",
          checked: true
        },
        {
          name: "Uppercase",
          value: "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
          checked: false
        },
        {
          name: "Numbers",
          value: "0123456789",
          checked: true
        },
        {
          name: "Special Characters",
          value: "_-+=)(*&^%$#@!`~",
          checked: false
        }
      ]
    };
  },
  methods: {
    generateUsername() {
      const adj = this.adjectives[
        Math.floor(Math.random() * this.adjectives.length)
      ];
      const noun = this.nouns[Math.floor(Math.random() * this.nouns.length)];
      this.username = adj + noun;
    },
    generatePassword() {
      let result = "";
      let charactersVal = "";
      let numLimit = this.minNumbers; // Set the number limit to 2
      let specCharLimit = this.minSpecialChars; // Set the special character limit to 1

      for (var j = 0; j < this.characters.length; j++) {
        if (this.characters[j].checked) {
          charactersVal += this.characters[j].value;
          if (this.characters[j].name === "Numbers") {
            // Append the desired number of numbers to the end of the string
            for (var k = 0; k < numLimit; k++) {
              charactersVal += "0123456789";
            }
          } else if (this.characters[j].name === "Special Characters") {
            // Append the desired number of special characters to the end of the string
            for (var k = 0; k < specCharLimit; k++) {
              charactersVal += "_-+=)(*&^%$#@!`~";
            }
          }
        }
      }

      let numCount = 0; // Counter for the number of numbers added to the password
      let specCharCount = 0; // Counter for the number of special characters added to the password

      for (var i = 0; i < this.passwordLength; i++) {
        let c = charactersVal.charAt(
          Math.floor(Math.random() * charactersVal.length)
        );
        if (numCount < numLimit && "0123456789".includes(c)) {
          // If the current character is a number and the number limit has not been reached, add it to the password and increment the counter
          result += c;
          numCount++;
        } else if (
          specCharCount < specCharLimit &&
          "_-+=)(*&^%$#@!`~".includes(c)
        ) {
          // If the current character is a special character and the special character limit has not been reached, add it to the password and increment the counter
          result += c;
          specCharCount++;
        } else if (!"0123456789_-+=)(*&^%$#@!`~".includes(c)) {
          // If the current character is not a number or special character, add it to the password
          result += c;
        } else {
          // If the current character is a number or special character but the limit for that character type has been reached, generate a new character
          i--;
        }
      }

      this.password = result;
    }
  }
};
</script>
