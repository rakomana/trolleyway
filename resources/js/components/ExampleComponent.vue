<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Trolleyway Messenger - {{user.name}}</div>

                    <div class="card-body p-0">
                        <ul
                            class="list-unstyled"
                            style="height: 300px; overflow-y: scroll"
                            v-chat-scroll
                        >
                            <li class="p-2" v-for="(message, index) in messages" :key="index">
                            <span>
                            <strong>
                                {{ message.user.name }}
                            </strong>
                            {{ message.message }}
                            </span>
                            </li>
                        </ul>
                        
                    <div class="text-muted" v-if="activeUser">
                        {{ activeUser.name }} is typing...
                    </div>
                    </div>
                    <input
                        @keydown="sendTypingEvent"
                        @keyup.enter="sendMessage"
                        v-model="newMessage"
                        type="text"
                        name="message"
                        placeholder="Enter your message..."
                        />

                        <div class="col-4">
                        <div class="card card-default">
                            <div class="card-header">Active Users</div>
                            <div class="card-body">
                            <ul>
                                <li class="py-2" v-for="(user, index) in users" :key="index">
                                    {{ user.name }}
                                </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["user"],
        data(){
            return{
                users: [],
                messages: [],
                newMessage: null,
                activeUser: false,
                typingTimer: false,
            }
        },
        created(){
            this.fetchMessages();
            Echo.private('chat')
            .listen('NewMessage', (e) => {
                this.messages.push(e.chat);  
            });

            Echo.private('chat')
            .here((user) => {
                this.users = user;
            });

            Echo.private('chat')
            .joining((user) => {
                this.users.push(user);
            });

            Echo.private('chat')
            .listenForWhisper('typing', (response) => {
                this.activeUser = response;
                if (this.typingTimer) {
                    clearTimeout(this.typingTimer);
                }
                this.typingTimer = setTimeout(() => {
                    this.activeUser = false;
                }, 1000);
            });
        },
        methods: {
            fetchMessages() {
                axios.get("messages").then((response) => {
                    this.messages = response.data;
                });
            },
            sendMessage() {
                axios.post("messages", { message: this.newMessage });
                this.newMessage = "";
            },
            sendTypingEvent() {
                Echo.private('chat').whisper("typing", this.user);
            },
        },
    }
</script>