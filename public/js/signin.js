async function signin(email, senha) {
  try {
    const response = await fetch('/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        email: email,
        senha: senha,
      }),
    });

    const data = await response.json();

    if (response.ok && data.token) {
      localStorage.setItem('auth_token', data.token);
      alert('Login realizado com sucesso!');
    } else {
      alert('Erro ao fazer login: ' + (data.error || JSON.stringify(data)));
    }
  } catch (error) {
    console.error('Erro na requisição:', error);
    alert('Erro na rede');
  }
}

async function signup(nome, email, senha) {
  try {
    const response = await fetch('/api/signup', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        nome: nome,
        email: email,
        senha: senha,
      }),
    });

    const data = await response.json();

    if (response.ok) {
      alert('Cadastro realizado com sucesso!');
    } else {
      console.error(data);
      alert('Erro ao cadastrar: ' + (data.message || JSON.stringify(data)));
    }
  } catch (error) {
    console.error('Erro na requisição:', error);
    alert('Erro na rede');
  }
}
