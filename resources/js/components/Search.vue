<template>
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="chat-window">
            <div class="chat-cont-left">
              <div class="chat-header">
                <span>Chats</span>
                <a href="javascript:void(0)" class="chat-compose">
                  <i class="material-icons">control_point</i>
                </a>
              </div>
              <form class="chat-search">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <i class="fa fa-search"></i>
                  </div>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search"
                  />
                </div>
              </form>
              <div class="chat-users-list">
                <div
                  class="chat-scroll"
                  v-for="(user, index) in users"
                  :key="index"
                >
                  <a href="javascript:void(0);" class="media">
                    <div class="media-img-wrap">
                      <div class="avatar avatar-away">
                        <img
                          src="user\assets\images\user.png"
                          alt="User Image"
                          class="avatar-img rounded-circle"
                        />
                      </div>
                    </div>
                    <div class="media-body">
                      <div>
                        <div class="user-name">{{ user.name }}</div>
                        <!-- <div class="user-last-chat">Hey, How are you?</div> -->
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="chat-cont-right">
              <div class="chat-header">
                <a
                  id="back_user_list"
                  href="javascript:void(0)"
                  class="back-user-list"
                >
                  <i class="material-icons">chevron_left</i>
                </a>
                <div class="media">
                  <div class="media-img-wrap">
                    <div class="avatar avatar-online">
                      <img
                        src="user\assets\images\user.png"
                        alt="User Image"
                        class="avatar-img rounded-circle"
                      />
                    </div>
                  </div>
                  <div class="media-body">
                    <div class="user-name">{{ user.name }}</div>
                    <div class="user-status">online</div>
                  </div>
                </div>
                <div class="chat-options">
                  <a href="javascript:void(0)">
                    <i class="material-icons">local_phone</i>
                  </a>
                  <a href="javascript:void(0)">
                    <i class="material-icons">videocam</i>
                  </a>
                  <a href="javascript:void(0)">
                    <i class="material-icons">more_vert</i>
                  </a>
                </div>
              </div>
              <div class="chat-body">
                <div class="chat-scroll">
                  <ul
                    class="list-unstyled"
                    v-for="(message, index) in messages"
                    :key="index"
                  >
                    <li class="media sent" v-if="user.id === message.user.id">
                      <div class="media-body">
                        <div class="msg-box">
                          <div>
                            <p>{{ message.message }}</p>
                            <ul class="chat-msg-info">
                              <li>
                                <div class="chat-time">
                                  <span>8:30 AM</span>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>

                    <li class="media received" v-else>
                      <div class="avatar">
                        <img
                          src="manager\assets\img\profiles\avatar-02.jpg"
                          alt="User Image"
                          class="avatar-img rounded-circle"
                        />
                      </div>
                      <div class="media-body">
                        <div class="msg-box">
                          <div>
                            <p>{{ message.message }}</p>
                            <ul class="chat-msg-info">
                              <li>
                                <div class="chat-time">
                                  <span
                                    >8:35 AM
                                    <small>{{ message.user.name }}</small></span
                                  >
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>

                  <ul v-if="activeUser">
                    <li class="media received">
                      <div class="avatar">
                        <img
                          src="manager\assets\img\profiles\avatar-02.jpg"
                          alt="User Image"
                          class="avatar-img rounded-circle"
                        />
                      </div>
                      <div class="media-body">
                        <div class="msg-box">
                          <div>
                            {{ activeUser.name }}
                            <div class="msg-typing">
                              <span></span>
                              <span></span>
                              <span></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="chat-footer">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="btn-file btn">
                      <i class="fa fa-paperclip" aria-hidden="true"></i>
                      <input type="file" />
                    </div>
                  </div>
                  <input
                    @keydown="sendTypingEvent"
                    v-model="newMessage"
                    type="text"
                    name="message"
                    placeholder="Enter your message..."
                  />
                  <div class="input-group-append">
                    <button type="button" class="btn msg-send-btn" @click.prevent="sendMessage">
                      <i class="fa fa-send"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Row -->
    </div>
  </div>
  <!-- /Page Wrapper -->
</template>

<script>
export default {
  props: ["user"],
  data() {
    return {
      users: [],
      messages: [],
      newMessage: null,
      activeUser: false,
      typingTimer: false,
    };
  },
  created() {
    this.fetchUsers();
    this.fetchMessages();
    Echo.private("chat").listen("NewMessage", (e) => {
      this.messages.push(e.chat);
    });

    Echo.private("chat").listenForWhisper("typing", (response) => {
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
    fetchUsers() {
      axios.get("users").then((response) => {
        this.users = response.data;
      });
    },
    sendMessage() {
      axios.post("messages", { message: this.newMessage });
      this.newMessage = "";
    },
    sendTypingEvent() {
      Echo.private("chat").whisper("typing", this.user);
    },
  },
};
</script>
