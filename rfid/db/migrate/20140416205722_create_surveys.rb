class CreateSurveys < ActiveRecord::Migration
  def change
    create_table :surveys do |t|
      t.references :attendance, index: true
      t.boolean :complete
      t.integer :workshop_rating
      t.integer :speaker_rating
      t.integer :conference_rating

      t.timestamps
    end
  end
end
