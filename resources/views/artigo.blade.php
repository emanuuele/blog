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
  <div class="relative flex size-full min-h-screen flex-col bg-neutral-50 group/design-root overflow-x-hidden" style='font-family: Newsreader, "Noto Sans", sans-serif;'>
    <div class="layout-container flex h-full grow flex-col">
      <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#ededed] px-10 py-3">
        <div class="flex items-center gap-4 text-[#141414]">
          <div class="size-4">
            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z"
                fill="currentColor"></path>
            </svg>
          </div>
          <h2 class="text-[#141414] text-lg font-bold leading-tight tracking-[-0.015em]">Blog</h2>
        </div>
        <div class="flex flex-1 justify-end gap-8">
          <div class="flex items-center gap-9">
            <a class="text-[#141414] text-sm font-medium leading-normal" href="/">Home</a>
          </div>
          <a
            href="/artigo/createForm"
            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#141414] text-neutral-50 text-sm font-bold leading-normal tracking-[0.015em]">
            <span class="truncate">Novo Artigo</span>
          </a>
          <div
            class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD1ALuBD24bByXex6ozKSyLqW4p6CqDbwbCY9k9_rGUIKFPJlsf4Hjm_X3pRxVNFt57W086Z5z_nxWMMhb6SFGYH2BX0H3LEFBL8hg7D8S_aOdfVETSoybv9nUujYraY-To9nXFRGF9wYbXG-2_rLrixWEVCRWKlyC3PEOdyvwT5vwn4tOT3i0TShgULziSGgYdjSXJByfiZmiJ6gX4liC2-lpXc66wrZ7lIRzmD8rlnJRV87EeuyjWS697J-Y1YeSfzBni0wGEM_A");'></div>
        </div>
      </header>
      <div class="px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
          <div class="flex flex-wrap gap-2 p-4">
            <a class="text-neutral-500 text-base font-medium leading-normal" href="/">Articles</a>
            <span class="text-neutral-500 text-base font-medium leading-normal">/</span>
            <span class="text-[#141414] text-base font-medium leading-normal"><?= $artigo->titulo ?></span>
          </div>
          <div class="flex w-[100%] justify-between">
            <h2 class="text-[#141414] tracking-light text-[28px] font-bold leading-tight px-4 text-left pb-3 pt-5"><?= $artigo->titulo ?></h2>
            @if ($artigo->usuario_id == \Illuminate\Support\Facades\Auth::user()->id)
              <span><a href="/artigo/updateForm/<?=$artigo->id?>">editar</a></span> \
              <span><button onclick="excluirArtigo(<?=$artigo->id?>)">excluir</button></span>
            @endif
          </div>
          <p class="text-neutral-500 text-sm font-normal leading-normal pb-3 pt-1 px-4">Publicado por <?= $artigo->usuario->nome ?>, <?= date('d/m/Y', strtotime($artigo->created_at)) ?></p>
          <p class="text-[#141414] text-base font-normal leading-normal pb-3 pt-1 px-4">
            <?= $artigo->conteudo ?>
          </p>
          <div class="flex flex-wrap gap-4 px-4 py-2 py-2">
            <button onclick="<?= $artigo->curtido ? '' : 'like(' . $artigo->id . ')' ?>" class="flex items-center justify-center gap-2 px-3 py-2">
              <div class="text-neutral-500" data-icon="Heart" data-size="24px" data-weight="regular">
                <?php if ($artigo->salvo): ?>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M128,222a8,8,0,0,1-4.1-1.1C120.2,219.7,16,163.1,16,94A62.07,62.07,0,0,1,78,32c20.65,0,38.73,8.88,50,23.89C139.27,40.88,157.35,32,178,32A62.07,62.07,0,0,1,240,94c0,69.1-104.2,125.7-107.9,126.9A8,8,0,0,1,128,222Z"/>
                  </svg>
                <?php else: ?>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M178,32c-20.65,0-38.73,8.88-50,23.89C116.73,40.88,98.65,32,78,32A62.07,62.07,0,0,0,16,94c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,220.66,240,164,240,94A62.07,62.07,0,0,0,178,32ZM128,206.8C109.74,196.16,32,147.69,32,94A46.06,46.06,0,0,1,78,48c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,147.61,146.24,196.15,128,206.8Z"></path>
                  </svg>
                <?php endif; ?>
              </div>
              <p class="text-neutral-500 text-[13px] font-bold leading-normal tracking-[0.015em]">
                <?= $artigo->curtidas ?>
              </p>
            </button>
            <div class="flex items-center justify-center gap-2 px-3 py-2">
              <div class="text-neutral-500" data-icon="ChatCircleDots" data-size="24px" data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M140,128a12,12,0,1,1-12-12A12,12,0,0,1,140,128ZM84,116a12,12,0,1,0,12,12A12,12,0,0,0,84,116Zm88,0a12,12,0,1,0,12,12A12,12,0,0,0,172,116Zm60,12A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-16,0A88,88,0,1,0,51.81,172.06a8,8,0,0,1,.66,6.54L40,216,77.4,203.53a7.85,7.85,0,0,1,2.53-.42,8,8,0,0,1,4,1.08A88,88,0,0,0,216,128Z"></path>
                </svg>
              </div>
              <p class="text-neutral-500 text-[13px] font-bold leading-normal tracking-[0.015em]"><?= sizeof($artigo->comentarios) ?></p>
            </div>
            <button onclick="<?= $artigo->salvo ? '' : 'save(' . $artigo->id . ')' ?>" class="flex items-center justify-center gap-2 px-3 py-2">
              <div class="text-neutral-500" data-icon="Bookmark" data-size="24px" data-weight="regular">
                <?php if ($artigo->salvo): ?>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M224,136.49V48a16,16,0,0,0-16-16H119.51a16,16,0,0,0-11.31,4.69l-80,80a16,16,0,0,0,0,22.62l96,96a16,16,0,0,0,22.62,0l80-80A16,16,0,0,0,224,136.49ZM216.49,144,136,224.49a8,8,0,0,1-11.31,0l-96-96a8,8,0,0,1,0-11.31l80-80A8,8,0,0,1,119.51,40H208a8,8,0,0,1,8,8v88.49A8,8,0,0,1,216.49,144Z"></path>
                  </svg>
                <?php else: ?>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M216,32H72A16,16,0,0,0,56,48V224a8,8,0,0,0,12.65,6.53L128,186.75l59.35,43.78A8,8,0,0,0,200,224V48A16,16,0,0,0,216,32ZM192,211.06l-51.35-37.9a8,8,0,0,0-9.3,0L80,211.06V48a0,0,0,0,1,0,0H216a0,0,0,0,1,0,0Z"></path>
                  </svg>
                <?php endif; ?>
              </div>
              <p class="text-neutral-500 text-[13px] font-bold leading-normal tracking-[0.015em]"><?= $artigo->salvamentos ?></p>
            </button>
          </div>
          <h2 class="text-[#141414] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Comentários</h2>
          <?php foreach ($artigo->comentarios as $comentario): ?>
            <div class="flex w-full flex-row items-start justify-start gap-3 p-4">
              <div
                class="bg-center bg-no-repeat aspect-square bg-cover rounded-full w-10 shrink-0"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBZAZESPGinw5c4sKwf4bv9ZoyfiSzua3pdBtGTm-ityb06YmsJvDRhPifeHiz9ttXp7sE2WO8S_4LRfb9AOcyDfqzHoM35dDAz-yKsekY-cYpioP9UL0LzYtOQjLZN5W1c_ivBsXHy-FeTyb74sJ2vDNYnrFNTlAutR2_lJCG-AVfF5DBX9gtofJfjG6X7gTuU5r7dYXVrkqlWiiNxtFvqPNTgkNfRNWhBvicHf3zB_Vt1e48_3ACaOD40sIiwt-5dRFQHSV7UTjk");'>
              </div>
              <div class="flex h-full flex-1 flex-col items-start justify-start">
                <div class="flex w-full flex-row items-start justify-start gap-x-3">
                  <p class="text-[#141414] text-sm font-bold leading-normal tracking-[0.015em]"><?= $comentario->usuario->nome ?></p>
                  <p class="text-neutral-500 text-sm font-normal leading-normal"><?= date('d/m/Y', strtotime($comentario->created_at)) ?> </p> 
                  @if ($comentario->usuario_id == \Illuminate\Support\Facades\Auth::user()->id)
                    <button onclick="editarButton(<?= $comentario->id ?>)"> editar </button> 
                    <button onclick="deleteComment(<?= $comentario->id ?>)"> excluir </button>
                  @endif
                </div>
                <p id="comment-<?= $comentario->id ?>" class="text-[#141414] text-sm font-normal leading-normal">
                  <?= $comentario->conteudo ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="flex items-center px-4 py-3 gap-3 @container">
            <div
              class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 shrink-0"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCwWe2AgnvVhhrur-rR_s5VzBdheYvSA9MWx-wEblkhMrLgmnulElX3GzP_nXjZOy36mt0yQexMcf7Qb63ypaJRfNmeGcguP0p7-OHA3TW1k91IzphbKcjA23_1SQalzMetWpkbpZFevCjE5MACe0UP5aFjDfgiDUloGkuncUxGKF2UDMCrb9qykZF_Mlj9JzD5YuwnE4X3Ab5j63NaY0qqcP4xyUfqifGLHZaPljzsB0O2Skyo76CmR3C3soqGcIhGe5skjEP6yzY");'></div>
            <label class="flex flex-col min-w-40 h-12 flex-1">
              <form action="/artigo/comment/<?= $artigo->id ?>" id="comment-form" method="post">
                @csrf
                <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                  <input
                    placeholder="Adicione um comentário"
                    id="comment-text"
                    name="conteudo"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#141414] focus:outline-0 focus:ring-0 border-none bg-[#ededed] focus:border-none h-full placeholder:text-neutral-500 px-4 rounded-r-none border-r-0 pr-2 text-base font-normal leading-normal"
                    value="" />
                  <div class="flex border-none bg-[#ededed] items-center justify-center pr-4 rounded-r-lg border-l-0 !pr-2">
                    <div class="flex items-center gap-4 justify-end">
                      <button
                        data-id_artigo="<?= $artigo->id ?>"
                        id="publicar-comentario-button"
                        class="min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-8 px-4 bg-[#141414] text-neutral-50 text-sm font-medium leading-normal hidden @[480px]:block">
                        <span class="truncate">publicar</span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="/js/artigo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</html>