import { useState } from 'react';
import './ProfileCard.css';

function ProfileCard() {
  //State for saving URL of uploaded image 
  const [avatarUrl, setAvatarUrl] = useState(null);

  //Students data 
  const studentName = "Кен Ньясими";
  const specialty = "Программная инженерия";
  const groupNumber = "БИВТ-24-1";
  const description = "Увлекаюсь веб-разработкой и созданием современных интерфейсов. В свободное время изучаю новые технологии и участвую в хакатонах.";

  //event handler for uploading images
  const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
      const imageUrl = URL.createObjectURL(file);
      setAvatarUrl(imageUrl);
    }
  };

  return (
    <div className="profile-card">
      <h1>Моя визитка</h1>
      
      {/* Avatar block */}
      <div className="avatar-section">
        {avatarUrl ? (
          <img src={avatarUrl} alt="Аватар пользователя" className="avatar" />
        ) : (
          <div className="avatar-placeholder">
            <span></span>
          </div>
        )}
        
        {/* List of skills, using */}
        <label className="upload-button">
          Загрузить аватарку
          <input 
            type="file" 
            accept="image/*" 
            onChange={handleImageUpload}
            style={{ display: 'none' }}
          />
        </label>
      </div>

      {/* Student info */}
    
      <div className="info-section">
        <p className="student-name">
          <strong>Имя студента:</strong> {studentName}
        </p>
        <p className="specialty">
          <strong>Специальность:</strong> {specialty}
        </p>
        <p className="group">
          <strong>Номер группы:</strong> {groupNumber}
        </p>
        <div className="description">
          <strong>О себе:</strong>
          <p>{description}</p>
        </div>
      </div>

      {/* Список навыков (дополнительный HTML-элемент ul/li) */}
      <div className="skills-section">
        <h3>Навыки</h3>
        <ul>
          <li>JavaScript / TypeScript</li>
          <li>React</li>
          <li>HTML5 / CSS3</li>
          <li>Node.js</li>
        </ul>
      </div>
    </div>
  );
}

export default ProfileCard;