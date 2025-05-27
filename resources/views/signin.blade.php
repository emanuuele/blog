<html>

<head>
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
  <link
    rel="stylesheet"
    as="style"
    onload="this.rel='stylesheet'"
    href="https://fonts.googleapis.com/css2?display=swap&amp;family=Newsreader%3Awght%40400%3B500%3B700%3B800&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900" />

  <title>Blog</title>
  <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body>
  <form id="loginForm">
    <div class="relative flex size-full min-h-screen flex-col bg-neutral-50 group/design-root overflow-x-hidden" style='font-family: Newsreader, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#ededed] px-10 py-3">
          <div class="flex items-center gap-4 text-[#141414]">
            <div class="size-4">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12.0799 24L4 19.2479L9.95537 8.75216L18.04 13.4961L18.0446 4H29.9554L29.96 13.4961L38.0446 8.75216L44 19.2479L35.92 24L44 28.7521L38.0446 39.2479L29.96 34.5039L29.9554 44H18.0446L18.04 34.5039L9.95537 39.2479L4 28.7521L12.0799 24Z"
                  fill="currentColor"></path>
              </svg>
            </div>
            <h2 class="text-[#141414] text-lg font-bold leading-tight tracking-[-0.015em]">Blog</h2>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-9">
              <a class="text-[#141414] text-sm font-medium leading-normal" href="/">Home</a>
            </div>
            <button
              class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#141414] text-neutral-50 text-sm font-bold leading-normal tracking-[0.015em]">
              <a class="truncate" href="/signupForm">Cadastrar</a>
            </button>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-1">
            <h2 class="text-[#141414] tracking-light text-[28px] font-bold leading-tight px-4 text-center pb-3 pt-5">Entre para comentar</h2>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#141414] text-base font-medium leading-normal pb-2">Email</p>
                <input
                  name="email"
                  placeholder="seu@email.com"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#141414] focus:outline-0 focus:ring-0 border border-[#dbdbdb] bg-neutral-50 focus:border-[#dbdbdb] h-14 placeholder:text-neutral-500 p-[15px] text-base font-normal leading-normal"
                  value="" />
              </label>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#141414] text-base font-medium leading-normal pb-2">Senha</p>
                <input
                  name="password"
                  type="password"
                  placeholder="Sua senha"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#141414] focus:outline-0 focus:ring-0 border border-[#dbdbdb] bg-neutral-50 focus:border-[#dbdbdb] h-14 placeholder:text-neutral-500 p-[15px] text-base font-normal leading-normal"
                  value="" />
              </label>
            </div>
            <div class="flex px-4 py-3 justify-center">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#141414] text-neutral-50 text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">Entrar</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>

<script>
  document
    .getElementById("loginForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        const email = this.email.value;
        const password = this.password.value;

        fetch("/api/signin", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                email: email,
                password: password,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success && data.token) {
                    localStorage.setItem("auth_token", data.token);
                    alert("Login realizado com sucesso!");
                    window.location.href = "/";
                } else {
                    alert(
                        "Erro ao fazer login: " +
                            (data.error || JSON.stringify(data))
                    );
                }
            })
            .catch((error) => {
                alert("Login failed: " + error.message);
            });
    });
</script>

</html>