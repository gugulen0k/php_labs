require 'sinatra'
require 'sinatra/reloader' if development?
require 'mail'

class FormValidator
  def self.validate_name(name)
    errors = []
    
    if name.nil? || name.empty?
      errors << "Имя обязательно для заполнения"
    else
      errors << "Имя должно быть не короче 3 символов" if name.length < 3
      errors << "Имя должно быть не длиннее 20 символов" if name.length > 20
      errors << "Имя не должно содержать цифр" if name.match?(/\d/)
    end
    
    errors
  end

  def self.validate_email(email)
    errors = []
    
    if email.nil? || email.empty?
      errors << "Email обязателен для заполнения"
    else
      begin
        address = Mail::Address.new(email)
        # Проверяем наличие @ и домена
        unless address.domain && address.address == email
          errors << "Неверный формат email адреса"
        end
        # Проверяем домен на наличие точки
        unless address.domain.include?('.')
          errors << "Неверный формат домена в email адресе"
        end
      rescue Mail::Field::ParseError
        errors << "Неверный формат email адреса"
      end
    end
    
    errors
  end

  def self.validate_comment(comment)
    errors = []
    
    if comment.nil? || comment.strip.empty?
      errors << "Комментарий обязателен для заполнения"
    else
      if comment.strip.length < 10
        errors << "Комментарий должен содержать минимум 10 символов"
      end
      if comment.strip.length > 1000
        errors << "Комментарий не должен превышать 1000 символов"
      end
    end
    
    errors
  end

  def self.validate_agreement(agree)
    agree == "on" ? [] : ["Необходимо согласиться на обработку данных"]
  end
end

# Root path redirects to review form
get '/' do
  erb :review
end

# Task 1: Review Form
get '/review' do
  erb :review
end

post '/review' do
  @name = params[:name]
  @email = params[:email]
  @review = params[:review]
  @comment = params[:comment]
  
  @errors = []
  @errors << "Необходимо указать имя" if @name.to_s.empty?
  @errors << "Необходимо указать email" if @email.to_s.empty?
  @errors << "Неверный формат email" unless @email.to_s.empty? || FormValidator.validate_email(@email).empty?
  @errors << "Необходимо оставить комментарий" if @comment.to_s.empty?
  
  @form_submitted = true
  erb :review
end

# Task 2: Event Registration Form
get '/event' do
  erb :event
end

post '/event' do
  @data = params
  @form_submitted = true
  erb :event
end

# Task 3: Contact Form
get '/contact' do
  erb :contact
end

post '/contact' do
  @name = params[:name]
  @email = params[:email]
  @comment = params[:comment]
  @agree = params[:agree]
  
  @errors = []
  @errors.concat(FormValidator.validate_name(@name))
  @errors.concat(FormValidator.validate_email(@email))
  @errors.concat(FormValidator.validate_comment(@comment))
  @errors.concat(FormValidator.validate_agreement(@agree))
  
  @form_submitted = true
  erb :contact
end

# Task 4: Quiz Form
get '/quiz' do
  erb :quiz
end

post '/quiz' do
  @username = params[:username]
  @answers = {
    q1: params[:q1],
    q2: params[:q2],
    q3: params[:q3]
  }
  
  @errors = []
  @errors << "Необходимо указать имя" if @username.to_s.empty?
  @errors << "Необходимо ответить на все вопросы" if @answers.values.any?(&:nil?)
  
  @form_submitted = true
  erb :quiz
end 